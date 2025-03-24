<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductPriceModel extends Model
{
    protected $table      = 'product_prices';
    protected $primaryKey = 'price_id';

    protected $allowedFields = ['product_id', 'price', 'start_date', 'end_date', 'created_at', 'created_by', 'updated_by', 'is_active'];

    public function getProductsForPortal()
    {
        return $this->select("product_prices.price
            , products.id
            , products.name
            , products.created_at
            , products.is_active
            , products.image
            , categories.name AS category_name
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join("products", "products.id = product_prices.product_id", "left")
            ->join('images', 'images.record_id = products.id', 'left')
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->where('images.type', 'product')
            ->where('product_prices.is_active', 1)
            ->where('products.is_active', 1)
            ->where('categories.is_active', 1)
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->findAll();
    }
}
