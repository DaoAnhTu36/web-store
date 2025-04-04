<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function detail_product($id)
    {
        $data = $this->productModel->get_detail_product_by_id($id);
        // debug_object($data);
        $data_view = [
            'data' => $data,
        ];
        return view('portal/product_detail_view', $data_view);
    }
}
