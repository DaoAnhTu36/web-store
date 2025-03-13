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

    public function indexView()
    {
        $data_view = [
            "title" => "Danh sách đơn hàng"
        ];
        return view("admin/order_view/index_view", $data_view);
    }

    // Lấy danh sách tất cả đơn hàng
    public function index()
    {
        return $this->respond($this->orderModel->findAll());
    }

    // Lấy chi tiết đơn hàng theo ID
    public function detail($id)
    {
        $order = $this->orderModel->find($id);
        if (!$order) {
            return $this->failNotFound("Không tìm thấy đơn hàng có ID: $id");
        }
        return $this->respond($order);
    }

    // Tạo đơn hàng mới
    public function create()
    {
        $data = $this->request->getPost();
        if ($this->orderModel->insert($data)) {
            return $this->respondCreated(['message' => 'Đơn hàng đã được tạo thành công']);
        }
        return $this->fail('Không thể tạo đơn hàng');
    }

    // Cập nhật đơn hàng theo ID
    public function updateOrder($id)
    {
        $data = $this->request->getRawInput();
        if ($this->orderModel->update($id, $data)) {
            return $this->respond(['message' => 'Cập nhật đơn hàng thành công']);
        }
        return $this->fail('Không thể cập nhật đơn hàng');
    }

    // Xóa đơn hàng theo ID
    public function deleteOrder($id)
    {
        if ($this->orderModel->delete($id)) {
            return $this->respondDeleted(['message' => 'Đơn hàng đã bị xóa']);
        }
        return $this->fail('Không thể xóa đơn hàng');
    }
}
