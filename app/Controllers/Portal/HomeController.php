<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;
use App\Models\BannerModel;
use App\Models\DiscountModel;
use App\Models\CategoryModel;

class HomeController extends BaseController
{
    protected $productModel;
    protected $productPriceModel;
    protected $bannerModel;
    protected $discountModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productPriceModel = new ProductPriceModel();
        $this->bannerModel = new BannerModel();
        $this->discountModel = new DiscountModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $title = "Cửa hàng trực tuyến";
        $categories = $this->categoryModel->get_all_category();
        $products = $this->productPriceModel->get_product_for_portal();
        $discounts = $this->discountModel->get_discount_alive();
        $data = [];
        $category_ids = array_column($categories, 'id');
        foreach ($products as $item) {
            if (in_array($item['category_id'], $category_ids)) {
            } else {
            }
        }
        foreach ($products as $item) {
            if (in_array($item['id'], array_column($discounts, 'product_id'))) {
                $item['discount'] = array_filter($discounts, function ($discount) use ($item) {
                    return $discount['product_id'] == $item['id'];
                });
                $item['discount'] = array_shift($item['discount']);
                if ($item['discount']['discount_type_id'] == 1) {
                    $item['discount']['price_sale'] = $item['price'] - ($item['price'] * $item['discount']['discount_value'] / 100);
                } else if ($item['discount']['discount_type_id'] == 2) {
                    $item['discount']['price_sale'] = $item['price'] - $item['discount']['discount_value'];
                }
            } else {
                $item['discount'] = null;
            }
            array_push($data, $item);
        }
        $data = group_array_by_key($data, 'category_id');
        $data_banners = $this->bannerModel->get_all_banner();
        $data_view = [
            'data' => $data,
            'title' => $title,
            'show_banner' => true,
            'data_banners' => $data_banners,
            'categories' => $categories,
        ];
        return view('portal/home_view', $data_view);
    }
}
