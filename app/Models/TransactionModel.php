<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table      = 'transactions'; // Tên bảng
    protected $primaryKey = 'id'; // Khóa chính

    protected $allowedFields = [
        'transaction_type',
        'transaction_date',
        'supplier_id',
        'customer_id',
        'note'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Lấy danh sách giao dịch kèm tổng tiền
    public function getAllTransactions()
    {
        return $this->select('transactions.*, SUM(transaction_details.quantity * transaction_details.unit_price) AS total_amount')
            ->join('transaction_details', 'transactions.id = transaction_details.transaction_id', 'left')
            ->groupBy('transactions.id')
            ->findAll();
    }

    // Thêm giao dịch mới
    public function addTransaction($data)
    {
        return $this->insert($data);
    }

    public function getAllImportTrans()
    {
        return $this->findAll();
    }

    public function getAllTransByType($type)
    {
        return $this->select('*')->where('transaction_type', $type)->findAll();
    }
}
