<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;

use App\Models\CustomerModel;
use App\Models\EmailTemplateModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ProductDiscountModel;
use App\Models\DiscountModel;

use App\Libraries\MailService;

class CartClientController extends BaseController
{
    protected $model;
    protected $mailService;
    protected $orderModel;
    protected $orderDetailModel;
    protected $emailTemplateModel;
    protected $session;
    protected $productDiscountModel;
    protected $discountModel;

    public function __construct()
    {
        $this->model = new CustomerModel();
        $this->mailService = new MailService();
        $this->emailTemplateModel = new EmailTemplateModel();
        $this->orderModel = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
        $this->session = session();
        $this->productDiscountModel = new ProductDiscountModel();
        $this->discountModel = new DiscountModel();
    }

    public function index()
    {
        $cart = $this->session->get('cart') ?? [];
        $summary_cart = $this->count_total_cart();
        $data_view = [
            'title' => 'Giỏ hàng',
            'show_banner' => false,
            'cart' => $cart,
            'summary_cart' => $summary_cart,
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
                'sub_total' => $quantity * $price,
                'sale_price' => 0,
            ];
        }

        $cart = $this->cal_sale_price($id, $cart);
        $this->session->set('cart', $cart);
        $total_item = array_sum(array_column($cart, 'quantity'));
        return apiResponse(true, 'Đã thêm vào giỏ hàng', [
            'total_item' => $total_item,
        ], '200');
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
            $cart[$id]['sub_total'] = $cart[$id]['quantity'] * ($cart[$id]['sale_price'] != 0 ? $cart[$id]['sale_price'] : $cart[$id]['price']);
            $sub_total = format_currency($cart[$id]['sub_total'], get_current_symboy());
        }
        $this->session->set('cart', $cart);
        $total_cart = $this->count_total_cart();
        $ret_val = [
            'sub_total' => $sub_total,
            'total_amount_cart' => $total_cart['total_amount_cart'],
            'total_item' => $total_cart['total_item'],
            'total_sale_cart' => $total_cart['total_sale_cart'],
            'total_pay_cart' => $total_cart['total_pay_cart']
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
        $total_amount_cart = 0;
        $total_sale_cart = 0;
        $total_pay_cart = 0;
        $total_item = 0;
        $cart = $this->session->get('cart') ?? [];
        if (count($cart) === 0) {
            return [
                'total_amount_cart' => format_currency(0, get_current_symboy()),
                'total_sale_cart' => format_currency(0, get_current_symboy()),
                'total_pay_cart' => format_currency(0, get_current_symboy()),
                'total_item' => $total_item,
            ];
        }
        foreach ($cart as $item) {
            $total_amount_cart += $item['price'] * $item['quantity'];
            if ($item['sale_price'] != 0) {
                $total_sale_cart += ($item['price'] - $item['sale_price']) * $item['quantity'];
            }
            $total_item += $item['quantity'];
        }
        $total_pay_cart = $total_amount_cart - $total_sale_cart;
        return [
            'total_amount_cart' => format_currency($total_amount_cart, get_current_symboy()),
            'total_sale_cart' => format_currency($total_sale_cart, get_current_symboy()),
            'total_pay_cart' => format_currency($total_pay_cart, get_current_symboy()),
            'total_item' => $total_item,
        ];
    }

    public function complete_order()
    {
        $order_infor_full_name = $this->request->getPost("order_infor_full_name");
        $order_infor_email = $this->request->getPost("order_infor_email");
        $order_infor_phone = $this->request->getPost("order_infor_phone");
        $order_infor_address = $this->request->getPost("order_infor_address");
        $order_infor_note = $this->request->getPost("order_infor_note");
        $cart = session()->get("cart");

        if (count($cart) == 0) {
            return redirect()->back()->with("errors", "Không có sản phẩm nào trong giỏ hàng");
        }
        $total_price = array_sum(array_column($cart, 'sub_total'));
        $table_product_in_mail = '';
        $customer_id = '';
        $customer_infor = $this->model
            ->where('email', $order_infor_email)
            ->orWhere('phone', $order_infor_phone)
            ->first();

        if ($customer_infor) {
            $this->model->update($customer_infor['id'], ['address' => $order_infor_address]);
            $customer_id = $customer_infor['id'];
            $data_order = [
                'user_id' => $customer_infor['id'],
                'total_price' => $total_price,
                'status' => 1,
                'created_by' => $customer_infor['id'],
                'note' => $order_infor_note
            ];
        } else {
            $first_name_verification_token = bin2hex(random_bytes(32));
            $customer_infor = [
                'first_name'    => $order_infor_full_name,
                'last_name'    => $order_infor_full_name,
                'email'   => $order_infor_email,
                'phone'   => $order_infor_phone,
                'password_hash' => password_hash('123@123', PASSWORD_DEFAULT),
                'verification_token' => $first_name_verification_token,
                'address' => $order_infor_address,
            ];
            $customer_id = $this->model->insert($customer_infor);
            $data_order = [
                'user_id' => $customer_id['id'],
                'total_price' => $total_price,
                'status' => 1,
                'created_by' => $customer_infor['id'],
                'updated_by' => $customer_infor['id'],
            ];
        }
        $order_id = $this->orderModel->insert($data_order);
        $filePath = FCPATH . 'template-email/body_table_order.html';
        $idx = 1;
        $table_product_in_mail = '';
        foreach ($cart as $item) {
            $htmlContent = file_get_contents($filePath);
            $data_order_detail = [
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'sub_total' => $item['sub_total'],
                'is_active' => 1,
                'created_by' => $customer_id,
            ];
            $htmlContent = str_replace('{{no}}', $idx, $htmlContent);
            $htmlContent = str_replace('{{product_name}}', $item['name'], $htmlContent);
            $htmlContent = str_replace('{{price}}', format_currency($item['price'], get_current_symboy()), $htmlContent);
            $htmlContent = str_replace('{{sale_price}}', format_currency($item['sale_price'], get_current_symboy()), $htmlContent);
            $htmlContent = str_replace('{{quantity}}', format_currency($item['quantity']), $htmlContent);
            $idx++;
            $table_product_in_mail .= $htmlContent;
            $this->orderDetailModel->save($data_order_detail);
        }

        $filePath = FCPATH . 'template-email/order_successful_template.html';
        if (file_exists($filePath)) {
            $htmlContent = file_get_contents($filePath);
            $mail_config = $this->emailTemplateModel->where('name', 'mail_order_successful')->first();
            $body = $htmlContent;
            $body = str_replace('{{logo}}', "cid:logo_cid", $body);
            $body = str_replace('{{order_id}}', $order_id, $body);
            $body = str_replace('{{order_date}}', get_current_datetime(), $body);
            $body = str_replace('{{total_amount}}', format_currency($total_price, get_current_symboy()), $body);
            $body = str_replace('{{address}}', $customer_infor['address'], $body);
            $body = str_replace('{{body_table_order}}', $table_product_in_mail, $body);
            $subject = $mail_config['subject'];
            $this->mailService->send_mail_mailer($customer_infor['email'], $subject, $body);
        }

        $this->session->remove('cart');
        return redirect()->to('portal/cart-client/order-successfull')->with("success", "Đặt hàng thành công");
    }

    public function order_successfull()
    {
        return view('portal/order_successful_view');
    }

    public function cal_sale_price($id, $cart)
    {
        $check_sale = $this->productDiscountModel
            ->select('discounts.discount_type_id, discounts.discount_value, discounts.usage_limit, discounts.used_count')
            ->join('discounts', 'product_discounts.discount_id = discounts.id AND discounts.is_active = 1')
            ->join('product_discount_details', 'product_discount_details.product_discount_id = product_discounts.id AND product_discount_details.is_active = 1 AND product_discount_details.product_id = ' . $id)
            ->where('product_discounts.is_active', 1)
            ->first();

        $sale_price = 0;
        if ($check_sale) {
            if ($check_sale['used_count'] < $check_sale['usage_limit']) {
                if ($check_sale) {
                    if ($check_sale['discount_type_id'] == 1) {
                        $sale_price = $cart[$id]['price'] - ($cart[$id]['price'] * $check_sale['discount_value'] / 100);
                    } else if ($check_sale['discount_type_id'] == 2) {
                        $sale_price = $cart[$id]['price'] - $check_sale['discount_value'];
                    }
                }
            }
            $cart[$id]['sub_total'] = $cart[$id]['quantity'] * $sale_price;
            $cart[$id]['sale_price'] = $sale_price ?? 0;
        }
        return $cart;
    }
}
