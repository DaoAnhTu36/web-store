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

    public function index()
    {
        $data = $this->priceModel->getPriceListByProduct();
        $data_view = [
            'title' => 'Danh sách giá sản phẩm',
            'data' => $data,
        ];
        return view('admin/product_view/product_price_view', $data_view);
    }

    public function create() {}

    public function save() {}

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}
}
