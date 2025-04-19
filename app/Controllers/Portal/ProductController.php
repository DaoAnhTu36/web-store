<?php

namespace App\Controllers\Portal;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;
use App\Models\DiscountModel;
use App\Models\ReviewModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $discountModel;
    protected $productPriceModel;
    protected $reviewModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->productPriceModel = new ProductPriceModel();
        $this->discountModel = new DiscountModel();
        $this->reviewModel = new ReviewModel();
    }

    public function detail_product($slug)
    {
        $slug = str_replace('.html', '', $slug);
        $detail_product = $this->productModel->get_detail_product_by_slug($slug);
        // debug_object($detail_product);
        $products = $this->productPriceModel->get_product_for_portal();
        $discounts = $this->discountModel->get_discount_alive();
        $data_relations = [];
        foreach ($products as $item) {
            if ($item['category_id'] == $detail_product['category_id']) {
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
                array_push($data_relations, $item);
            }
        }
        $reviews = $this->reviewModel->get_reviews_by_product_id($detail_product['id'], 1, 10);
        $count_reviews = $this->reviewModel->where('product_id', $detail_product['id'])->countAllResults();
        $data_view = [
            'title' => $detail_product['name'],
            'data' => $detail_product,
            'data_relations' => $data_relations,
            'reviews' => $reviews,
            'page' => 1,
            'product_id' => $detail_product['id'],
            'count_reviews' => $count_reviews,
            'count_reviews_page' => ceil($count_reviews / 10)
        ];
        return view('portal/product_detail_view', $data_view);
    }

    public function load_more_reviews()
    {
        $page = $this->request->getPost('page');
        $product_id = $this->request->getPost('product_id');
        $reviews = $this->reviewModel->get_reviews_by_product_id($product_id, $page, 10);
        return apiResponse(200, 'success', $reviews);
    }

    public function search_product()
    {
        $keyword = $this->request->getPost('keyword');
        $resutl_search = $this->productModel->search_product($keyword);
        return apiResponse(200, 'success', $resutl_search);
    }
}
