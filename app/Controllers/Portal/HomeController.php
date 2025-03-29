<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;
use App\Models\BannerModel;

class HomeController extends BaseController
{
    protected $productModel;
    protected $productPriceModel;
    protected $bannerModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productPriceModel = new ProductPriceModel();
        $this->bannerModel = new BannerModel();
    }

    public function index()
    {
        $title = "Trang chủ";
        $data = $this->productPriceModel->getProductsForPortal();
        $data_banners = $this->bannerModel->get_all_banner();
        $data_view = [
            'data' => $data,
            'title' => $title,
            'show_banner' => true,
            'data_banners' => $data_banners,
        ];
        return view('portal/home_view', $data_view);
    }
}
