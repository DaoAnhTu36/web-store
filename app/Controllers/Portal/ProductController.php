<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function __construct()
    {
        helper("common");
    }

    public function detail_product($id)
    {
        $model = new \App\Models\ProductModel();
        $data = $model->getProductsWithImagesByProductId($id);
        // EchoCommon($data);
        $data_view = [
            'data' => $data,
        ];
        return view('portal/product_detail_view', $data_view);
    }
}
