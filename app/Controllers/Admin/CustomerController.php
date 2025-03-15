<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data_view = [
            "title" => "Danh sách khách hàng",
        ];
        return view("admin/customer_view/index_view", $data_view);
    }

    public function create()
    {
        $data_view = [
            "title" => "Thêm mới khách hàng",
        ];
        return view("admin/customer_view/create_view", $data_view);
    }

    public function save()
    {
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name'    => $this->request->getPost('name'),
                'email'   => $this->request->getPost('email'),
                'phone'   => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
            ];

            if ($this->customerModel->insert($data)) {
                return redirect()->to('admin/customer')->with('success', 'Thêm khách hàng thành công!');
            } else {
                return redirect()->back()->with('error', 'Thêm khách hàng thất bại!');
            }
        }

        return view('admin/customer');
    }

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
