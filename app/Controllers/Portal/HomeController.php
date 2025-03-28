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
        $title = "Trang chủ";
        $data = $this->productPriceModel->getProductsForPortal();
        $data_view = [
            'data' => $data,
            'title' => $title,
            'show_banner' => true,
        ];
        return view('portal/home_view', $data_view);
    }
}
