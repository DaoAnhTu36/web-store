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

    protected $validationRules = [
        'attribute_name' => 'required',
        'attribute_value' => 'required',
    ];

    protected $validationMessages = [
        'attribute_name' => [
            'required' => 'Tên thuộc tính là bắt buộc',
        ],
        'attribute_value' => [
            'required' => 'Giá trị thuộc tính là bắt buộc',
        ]
    ];

    protected $allowedFields = [
        'attribute_name',
        'attribute_value',
        'is_active',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function get_attribute_group_by_name()
    {
        return $this->select("attribute_name, GROUP_CONCAT(CONCAT(id, ':', attribute_value) ORDER BY id SEPARATOR ', ') as id_value_list")
            ->where('is_active', 1)
            ->groupBy('attribute_name')
            ->findAll();
    }
}
