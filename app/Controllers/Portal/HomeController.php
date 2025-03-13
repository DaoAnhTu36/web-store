<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $model = new \App\Models\ProductModel();
        $data = $model->getProductsWithImages();
        $data_view = [
            'data' => $data,
        ];
        return view('portal/home_view', $data_view);
    }
}
