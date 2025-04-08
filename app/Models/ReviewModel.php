<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'email',
        'product_id',
        'rating',
        'comment',
        'created_at',
        'created_by',
        'updated_by',
        'is_active'
    ];

    protected $returnType = 'array';
    protected $createdField = 'created_at';

    public function get_reviews_by_product_id($product_id, $page = 1, $limit = 10)
    {
        return $this->where('product_id', $product_id)->orderBy('created_at', 'desc')->paginate($limit, 'default', $page);
    }
}
