<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table      = 'orders'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính của bảng

    protected $useAutoIncrement = true;

    protected $returnType     = 'array'; // Kiểu dữ liệu trả về
    protected $useSoftDeletes = false; // Có sử dụng soft deletes không (nếu có, bạn cần thêm cột deleted_at)

    protected $allowedFields = [ // Các cột được phép ghi/sửa
        'user_id',
        'total_price',
        'status',
        'created_at',
        'is_active',
        'created_by',
        'updated_by',
        'note',
        'updated_at',
    ];

    protected $useTimestamps = true; // Có sử dụng timestamps không
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $dateFormat    = 'datetime'; // Định dạng ngày giờ

    protected $validationRules    = []; // Quy tắc validate dữ liệu (nếu cần)
    protected $validationMessages = []; // Thông báo lỗi validate (nếu cần)
    protected $skipValidation     = false; // Có bỏ qua validate không

    public function get_list_order()
    {
        return $this->select('orders.id
        , orders.user_id
        , orders.total_price
        , orders.status
        , orders.created_at as order_created_at
        , customers.first_name as customer_first_name
        , customers.last_name as customer_last_name
        ')
            ->join('customers', 'orders.user_id = customers.id', 'left')
            ->orderBy('orders.created_at', 'desc')
            ->findAll();
    }
}
