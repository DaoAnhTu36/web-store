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

    public function delete_attribute_value($product_id)
    {
        $query = "DELETE FROM product_attribute_values WHERE product_id = ?";
        return $this->db->query($query, [$product_id]);
    }

    public function get_product_attribute_value($product_id)
    {
        return $this->select("attribute_id")
            ->where("product_id", $product_id)
            ->findAll();
    }
}
