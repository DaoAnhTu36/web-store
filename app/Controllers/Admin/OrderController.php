<?php

namespace App\Controllers\Admin;

use App\Models\OrderModel;
use CodeIgniter\RESTful\ResourceController;

class OrderController extends ResourceController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    public function index()
    {
        $data_view = [
            "title" => "Danh sách đơn hàng"
        ];
        return view("admin/order_view/index_view", $data_view);
    }
}
