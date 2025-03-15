<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class TransactionController extends BaseController
{
    protected $modelTransaction;
    protected $modelTransactionDetail;
    public function __construct()
    {
        helper("common");
        helper("language");
        $this->modelTransaction = new TransactionModel();
        $this->modelTransactionDetail = new TransactionDetailModel();
    }

    public function index() {}

    public function create() {}

    public function save() {}

    public function detail($id) {}

    public function update($id) {}

    public function delete($id) {}

    public function importList()
    {
        $data = $this->modelTransaction->getAllTransByType('import');
        $data_view = [
            "title" => "Danh sách nhập hàng",
            "data" => $data
        ];
        return view("admin/transaction_view/import_view", $data_view);
    }
    public function exportList()
    {
        $data = $this->modelTransaction->getAllTransByType('export');
        $data_view = [
            "title" => "Danh sách xuất hàng",
            "data" => $data
        ];
        return view("admin/transaction_view/export_view", $data_view);
    }
}
