<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;

use App\Models\CustomerModel;
use App\Models\EmailTemplateModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

use App\Libraries\MailService;

class CartClientController extends BaseController
{
    protected $model;
    protected $mailService;
    protected $orderModel;
    protected $orderDetailModel;
    protected $emailTemplateModel;
    protected $session;

    public function __construct()
    {
        $this->model = new CustomerModel();
        $this->mailService = new MailService();
        $this->emailTemplateModel = new EmailTemplateModel();
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
        $this->session = session();
    }

    public function index()
    {
        $cart = $this->session->get('cart') ?? [];
        $total_cart = $this->count_total_cart();
        $data_view = [
            'title' => 'Giỏ hàng',
            'show_banner' => false,
            'cart' => $cart,
            'total_cart' => $total_cart,
        ];
        return view('portal/cart_view', $data_view);
    }

    public function add_to_cart()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $price = $this->request->getPost('price');
        $quantity = $this->request->getPost('quantity');
        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
            $cart[$id]['sub_total'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'sub_total' => $quantity * $price
            ];
        }

        $this->session->set('cart', $cart);

        return apiResponse(true, 'Đã thêm vào giỏ hàng', null, '200');
    }

    public function clear_cart()
    {
        $this->session->remove('cart');
        return redirect()->back();
    }

    public function change_quantity()
    {
        $sub_total = '';
        $id = $this->request->getPost('id');
        $type = $this->request->getPost('type');
        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] === 0 && $type === '-') {
            } else {
                $cart[$id]['quantity'] += $type === '+' ? 1 : -1;
            }
            $cart[$id]['sub_total'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            $sub_total = format_currency($cart[$id]['sub_total'], get_current_symboy());
        }
        $this->session->set('cart', $cart);
        $total_cart = $this->count_total_cart();
        $ret_val = [
            'sub_total' => $sub_total,
            'total_cart' => $total_cart,
        ];
        return apiResponse(true, '', $ret_val, '200');
    }

    public function remove_item_cart()
    {
        $id = $this->request->getPost('id');
        $cart = $this->session->get('cart') ?? [];
        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->session->set('cart', $cart);
        }
        $total_cart = $this->count_total_cart();
        $ret_val = [
            'total_cart' => $total_cart,
        ];
        return apiResponse(true, '', $ret_val, '200');
    }

    public function count_total_cart()
    {
        $result = 0;
        $cart = $this->session->get('cart') ?? [];
        if (count($cart) === 0) {
            return format_currency(0, get_current_symboy());
        }
        foreach ($cart as $item) {
            $result += $item['quantity'] * $item['price'];
        }
        return format_currency($result, get_current_symboy());
    }
}
