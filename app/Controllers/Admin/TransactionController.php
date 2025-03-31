<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;
use App\Models\WarehouseModel;
use App\Models\InventoryModel;

class TransactionController extends BaseController
{
    protected $modelTransaction;
    protected $modelTransactionDetail;
    protected $modelCustomer;
    protected $modelSupplier;
    protected $modelProduct;
    protected $modelWarehouse;
    protected $modelInventory;

    public function __construct()
    {
        $this->modelTransaction = new TransactionModel();
        $this->modelTransactionDetail = new TransactionDetailModel();
        $this->modelCustomer = new CustomerModel();
        $this->modelSupplier = new SupplierModel();
        $this->modelProduct = new ProductModel();
        $this->modelWarehouse = new WarehouseModel();
        $this->modelInventory = new InventoryModel();
    }

    public function index() {}

    public function create()
    {
        $suppliers = $this->modelSupplier->select('id, name')->where('is_active', 1)->findAll();
        $products  = $this->modelProduct->select('id, name')->where('is_active', 1)->findAll();
        $warehouses = $this->modelWarehouse->select('id, name')->where('is_active', 1)->findAll();
        $data_view = [
            "title" => "Thêm mới giao dịch hàng hóa",
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
                'product_attribute_id' => $item['product_attribute_id'],
            ];
            $this->modelTransactionDetail->insert($data_trans_detail);

            // Update inventory
            $check_exist_inventory = $this->modelInventory
                ->where('product_id', $item['product_id'])
                ->where('product_attribute_id', $item['product_attribute_id'])
                ->where('warehouse_id', $request->getPost('warehouse_id'))
                ->first();
            if ($check_exist_inventory) {
                $quantity = $check_exist_inventory['quantity'] + $item['quantity'];
                $this->modelInventory->update($check_exist_inventory['id'], ['quantity' => $quantity]);
            } else {
                $data_inventory = [
                    'product_id' => $item['product_id'],
                    'product_attribute_id' => $item['product_attribute_id'],
                    'quantity' => $item['quantity'],
                    'warehouse_id' => $request->getPost('warehouse_id'),
                ];
                $this->modelInventory->save($data_inventory);
            }
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

    public function getPriceHistory()
    {
        $product_id = $this->request->getPost("product_id");
        $data = $this->modelTransactionDetail->getPriceHistory($product_id);
        return apiResponse(true, 'Success', $data, 200);
    }
}
