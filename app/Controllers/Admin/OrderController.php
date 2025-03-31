<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\OrderModel;
use App\Models\CustomerModel;
use App\Models\OrderDetailModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $customerModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->customerModel = new CustomerModel();
        $this->orderDetailModel = new OrderDetailModel();
    }

    public function index()
    {
        $orders = $this->orderModel->get_list_order();
        $data_view = [
            "title" => "Danh sách đơn hàng",
            "data" => $orders
        ];
        return view("admin/order_view/index_view", $data_view);
    }

    public function get_order_detail()
    {
        $order_id = $this->request->getPost("order_id");
        $orders = $this->orderDetailModel->get_order_detail($order_id);
        return apiResponse(true, '', $orders, '200');
    }

    public function change_status_order()
    {
        try {
            $order_id = $this->request->getPost('order_id');
            $status = $this->request->getPost('status');
            $this->orderModel->update($order_id, ['status' => $status]);
            return apiResponse(true, 'Thay đổi trạng thái đơn hàng thành công');
        } catch (\Throwable $th) {
            return apiResponse(false, $th->getMessage());
        }
    }
}
