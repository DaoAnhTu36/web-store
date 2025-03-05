<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images'; // Tên bảng trong database
    protected $primaryKey = 'id'; // Khóa chính
    protected $allowedFields = ['record_id', 'image_path']; // Các cột có thể insert/update
}
