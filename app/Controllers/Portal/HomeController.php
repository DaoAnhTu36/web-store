<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;

class HomeController extends BaseController
{
    protected $productModel;
    protected $productPriceModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productPriceModel = new ProductPriceModel();
    }

    public function index()
    {
        $data = $this->productPriceModel->getProductsForPortal();
        $data_view = [
            'data' => $data,
        ];
        return view('portal/home_view', $data_view);
    }
}
