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

    public function indexView()
    {
        $data_view = [
            'title' => 'Danh sách sản phẩm giảm giá',
        ];
        return view('admin/product_view/product_discount_view', $data_view);
    }
}
