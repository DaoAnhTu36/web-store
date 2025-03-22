<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductAttributeModel extends Model
{
    protected $table      = 'product_attributes';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Các cột được phép insert/update
    protected $allowedFields = [
        'attribute_name',
        'attribute_value',
        'is_active',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    // Bật timestamps để tự động cập nhật thời gian
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Nếu muốn validation:
    // protected $validationRules = [ ... ];

    public function getAttributeGroupByName()
    {
        return $this->select("attribute_name, GROUP_CONCAT(CONCAT(id, ':', attribute_value) ORDER BY id SEPARATOR ', ') as id_value_list")
            ->where('is_active', 1)
            ->groupBy('attribute_name')
            ->findAll();
    }
}
