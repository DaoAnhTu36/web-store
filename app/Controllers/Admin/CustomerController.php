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

    public function index() {}

    public function create() {}

    public function save() {}

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
