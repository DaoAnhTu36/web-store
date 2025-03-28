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
        $data_view = [
            "title" => "Danh sách đơn hàng"
        ];
        return view("admin/order_view/index_view", $data_view);
    }
}
