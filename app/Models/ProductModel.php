<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'name',
        'category_id',
        'description',
        'price',
        'stock',
        'created_at',
        'created_by',
        'updated_by',
        'is_active'
    ];

    public function getProductsWithImages()
    {
        return $this->select("products.id
            , products.name
            , products.price
            , products.stock
            , products.description
            , products.created_at
            , products.is_active
            , categories.name AS category_name
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = products.id', 'left')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->where('images.type', 'product')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->findAll();
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }

    public function getProductsWithImagesByProductId($productId)
    {
        return $this->select("products.id
            , products.name
            , products.price
            , products.stock
            , products.description
            , products.created_at
            , products.category_id
            , products.is_active
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = products.id', 'left')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->where('products.id', $productId)
            ->where('images.type', 'product')
            ->first();
    }
}
