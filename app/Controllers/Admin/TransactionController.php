<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\WarehouseModel;

class TransactionController extends BaseController
{
    protected $modelTransaction;
    protected $modelTransactionDetail;
    protected $modelCustomer;
    protected $modelSupplier;
    protected $modelProduct;
    protected $modelWarehouse;

    public function __construct()
    {
        helper("common");
        helper("language");
        $this->modelTransaction = new TransactionModel();
        $this->modelTransactionDetail = new TransactionDetailModel();
        $this->modelCustomer = new CustomerModel();
        $this->modelSupplier = new SupplierModel();
        $this->modelProduct = new ProductModel();
        $this->modelWarehouse = new WarehouseModel();
    }

    public function index() {}

    public function create()
    {
        $customers = $this->modelCustomer->where('is_active', 1)->findAll();
        $suppliers = $this->modelSupplier->where('is_active', 1)->findAll();
        $products  = $this->modelProduct->where('is_active', 1)->findAll();
        $warehouses = $this->modelWarehouse->where('is_active', 1)->findAll();
        $data_view = [
            "title" => "Thêm mới giao dịch hàng hóa",
            "customers" => $customers,
            "suppliers" => $suppliers,
            "products" => $products,
            "warehouses" => $warehouses
        ];
        return view("admin/transaction_view/create_view", $data_view);
    }

    public function save()
    {
        $request = service('request');
        $data_trans = [
            'transaction_type' => $request->getPost('transaction_type'),
            'transaction_date' => $request->getPost('transaction_date'),
            'customer_id' => $request->getPost('customer_id'),
            'supplier_id' => $request->getPost('supplier_id'),
            'warehouse_id' => $request->getPost('warehouse_id'),
        ];
        $tran_id = $this->modelTransaction->insert($data_trans);
        foreach ($request->getPost('list_trans_detail') as $item) {
            $data_trans_detail = [
                'transaction_id' => $tran_id,
                'product_id' => $item['product_id'],
                'unit_price' => $item['unit_price'],
                'quantity' => $item['quantity'],
            ];
            $this->modelTransactionDetail->insert($data_trans_detail);
        }
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Thêm mới giao dịch thành công'
        ]);
    }

    public function detail($id)
    {
        $transactionDetails = $this->modelTransactionDetail->getDetailTrans($id);
        $transaction = $transactionDetails[0];
        $data_view = [
            "title" => "Chi tiết giao dịch",
            "transactionDetail" => $transactionDetails,
            "transaction" => $transaction
        ];
        return view("admin/transaction_view/detail_view", $data_view);
    }

    public function update($id) {}

    public function delete($id)
    {
        $this->modelTransactionDetail->deleteById($id);
        $this->modelTransaction->deleteById($id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

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
