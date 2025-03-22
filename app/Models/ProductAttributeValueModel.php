<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductAttributeValueModel extends Model
{
    protected $table      = 'product_attribute_values';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'product_id',
        'attribute_id',
        'is_active',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
