<?php

namespace App\Controllers\Admin;

use App\Models\ProductDiscountModel;
use App\Controllers\BaseController;

class ProductDiscountController extends BaseController
{
    protected $discountModel;

    public function __construct()
    {
        $this->discountModel = new ProductDiscountModel();
        helper("common");
        helper("language");
    }

    public function index()
    {
        $data = $this->discountModel->getAllDiscount();
        $data_view = [
            'title' => 'Danh sách sản phẩm giảm giá',
            'data' => $data,
        ];
        return view('admin/product_view/product_discount_view', $data_view);
    }

    public function create() {}

    public function save() {}

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
