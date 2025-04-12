<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionDetailModel extends Model
{
    protected $table      = 'transaction_details';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'transaction_id',
        'product_id',
        'quantity',
        'unit_price',
        'created_by',
        'updated_by',
        'is_active',
        'product_attribute_id',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Lấy chi tiết của một giao dịch cụ thể
    public function getTransactionDetails($transactionId)
    {
        return $this->where('transaction_id', $transactionId)->findAll();
    }

    // Thêm nhiều chi tiết cho một giao dịch
    public function addTransactionDetails($details)
    {
        return $this->insertBatch($details);
    }

    public function getDetailTrans($id)
    {
        return $this->select(
            'transactions.id as trans_id
        , transactions.transaction_type
        , transactions.transaction_date
        , transactions.note
        , transactions.created_at
        , transactions.updated_at
        , transaction_details.product_id
        , transaction_details.quantity
        , transaction_details.unit_price
        , transaction_details.subtotal
        , transaction_details.id as trans_detail_id
        , products.name as product_name
        , categories.name as category_name
        , IFNULL(warehouses.name, "") as warehouse_name
        , IFNULL(suppliers.name, "") as supplier_name
        , IFNULL(product_attributes.attribute_value, "") as attribute_value'
        )
            ->join('transactions', 'transactions.id = transaction_details.transaction_id', 'left')
            ->join('warehouses', 'warehouses.id = transactions.warehouse_id', 'left')
            ->join('suppliers', 'suppliers.id = transactions.supplier_id', 'left')
            ->join('products', 'products.id = transaction_details.product_id', 'left')
            ->join('categories', 'products.category_id = categories.id', 'left')
            ->join('product_attributes', 'product_attributes.id = transaction_details.product_attribute_id', 'left')
            ->where('transaction_details.transaction_id', $id)
            ->where('transaction_details.is_active', true)
            ->findAll();
    }

    public function deleteById($id)
    {
        return $this->where('transaction_id', $id)->delete();
    }

    public function get_history_price_by_product_id($id)
    {
        return $this->select('unit_price, created_at')
            ->where('product_id', $id)
            ->orderBy('created_at', 'desc')
            ->findAll();
    }
}
