<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính
    protected $useAutoIncrement = true; // Sử dụng auto increment
    protected $allowedFields = ['record_id', 'image_path', 'type', 'created_by', 'updated_by', 'is_active']; // Các cột có thể insert/update
}
