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
        'unit_price'
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
}
