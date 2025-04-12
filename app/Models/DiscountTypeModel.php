<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscountTypeModel extends Model
{
    protected $table            = 'discount_types';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'name',
        'description',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $validationRules = [
        'name' => 'required',
        'description' => 'required',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Tên loại giảm giá là bắt buộc',
        ],
        'description' => [
            'required' => 'Mô tả là bắt buộc',
        ]
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
