<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductPriceModel extends Model
{
    protected $table      = 'product_prices';
    protected $primaryKey = 'id';

    protected $allowedFields = ['product_id', 'price', 'start_date', 'end_date', 'created_at', 'created_by', 'updated_by', 'is_active'];

    public function get_product_for_portal()
    {
        return $this->select("product_prices.price
            , products.id
            , products.name
            , products.slug
            , products.created_at
            , products.is_active
            , products.image
            , categories.id AS category_id
            , categories.name AS category_name")
            ->join("products", "products.id = product_prices.product_id AND products.is_active = 1", "left")
            ->join('categories', 'categories.id = products.category_id AND categories.is_active = 1 AND categories.is_display = 1', 'left')
            ->where('product_prices.is_active', 1)
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->findAll();
    }

    public function get_product_price()
    {
        return $this->select("product_prices.price
            , products.id AS product_id
            , products.name AS product_name
            , product_prices.id
            , product_prices.start_date
            , product_prices.end_date")
            ->join("products", "products.id = product_prices.product_id", "left")
            ->where('product_prices.is_active', 1)
            ->where('products.is_active', 1)
            ->orderBy('product_prices.created_at', 'DESC')
            ->findAll();
    }

    public function get_current_price_by_product_id($product_id)
    {
        $ret_val =  $this
            ->where('product_id', $product_id)
            ->where('is_active', 1)
            ->orderBy('created_at', 'desc')->first();
        return $ret_val;
    }
}
