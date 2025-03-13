<?php

namespace App\Controllers\Admin;

use App\Models\BestSellingProductModel;
use App\Controllers\BaseController;

class BestSellingProductController extends BaseController
{
    protected $bestSellingModel;

    public function __construct()
    {
        $this->bestSellingModel = new BestSellingProductModel();
        helper("common");
        helper("language");
    }

    public function indexView()
    {
        $data_view = [
            'title' => 'Danh sách sản phẩm bán chạy',
        ];
        return view("admin/best_selling_product_view/index_view", $data_view);
    }
}
