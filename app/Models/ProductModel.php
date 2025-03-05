<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'category_id',
        'description',
        'price',
        'stock',
        'created_at'
    ];

    public function getProductsWithImages()
    {
        return $this->select("products.id
            , products.name
            , products.price
            , products.stock
            , products.description
            , products.created_at
            , products.category_id
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = products.id', 'left')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->findAll();
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
}
