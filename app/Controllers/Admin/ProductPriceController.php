<?php

namespace App\Controllers\Admin;

use App\Models\ProductPriceModel;
use App\Controllers\BaseController;

class ProductPriceController extends BaseController
{
    protected $priceModel;

    public function __construct()
    {
        $this->priceModel = new ProductPriceModel();
        helper("common");
        helper("language");
    }

    public function indexView()
    {
        $data_view = [
            'title' => 'Danh sách giá sản phẩm',
        ];
        return view('admin/product_view/product_price_view', $data_view);
    }
}
