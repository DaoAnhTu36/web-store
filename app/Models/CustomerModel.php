<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table      = 'customers'; // Tên bảng
    protected $primaryKey = 'id'; // Khóa chính

    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password_hash',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'date_of_birth',
        'gender',
        'profile_picture',
        'verification_token',
        'is_verified',
        'is_active'
    ];

    protected $useTimestamps = true; // Sử dụng `created_at` và `updated_at`
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType = 'array'; // Có thể đổi thành 'object' nếu muốn

}
