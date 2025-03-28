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

    public function complete()
    {
        $full_name = $this->request->getPost("full_name");
        $email = $this->request->getPost("email");
        $phone = $this->request->getPost("phone");
        $address = $this->request->getPost("address");
        $note = $this->request->getPost("note");
        $data = [
            "full_name" => $full_name,
            "email" => $email,
            "phone" => $phone,
            "address" => $address,
            "note" => $note,
        ];
        return redirect()->back()->with("success", "Đặt hàng thành công");
        EchoCommon($data);
        EchoCommon(session()->get("cart"));
    }
}
