<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;

class CustomerController extends BaseController
{
    protected $model;
    protected $mailService;
    protected $emailTemplateModel;

    public function __construct()
    {
        $this->model = new CustomerModel();
    }

    public function index()
    {
        $data = $this->model->findAll();
        $data_view = [
            "title" => "Danh sách khách hàng",
            "data" => $data,
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

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
