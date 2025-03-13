<?php

namespace App\Controllers\Admin;

use App\Models\StockModel;
use App\Controllers\BaseController;

class StockController extends BaseController
{
    protected $stockModel;

    public function __construct()
    {
        $this->stockModel = new StockModel();
        helper("common");
        helper("language");
    }

    public function indexView()
    {
        $data_view = [
            'title' => 'Danh sách sản phẩm tồn kho',
        ];
        return view('admin/stock_view/index_view', $data_view);
    }
}
