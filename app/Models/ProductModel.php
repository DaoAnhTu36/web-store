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
        'created_at',
        'created_by',
        'updated_by',
        'is_active',
        'image',
        'description',
    ];

    protected $validationRules    = [
        'name'        => 'required',
        'category_id' => 'required|integer',
        'description' => 'required',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Tên sản phẩm là bắt buộc.',
        ],
        'category_id' => [
            'required' => 'Danh mục sản phẩm là bắt buộc.',
            'integer' => 'Danh mục phải là số',
        ],
        'description' => [
            'required' => 'Mô tả sản phẩm là bắt buộc.',
        ],
    ];


    public function get_product_with_image()
    {
        return $this->select("products.id
            , products.name
            , products.created_at
            , products.is_active
            , products.image
            , categories.name AS category_name
            , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '),'') AS images")
            ->join('images', "images.record_id = products.id AND images.type = 'product'", 'left')
            ->join('categories', "categories.id = products.category_id", 'left')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->findAll();
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }

    public function get_product_with_image_by_id($productId)
    {
        return $this->select("products.id
            , products.name
            , products.created_at
            , products.category_id
            , products.is_active
            , products.image
            , products.description
            , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '),'') AS images")
            ->join('images', "images.record_id = products.id AND images.type = 'product'", 'left')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->where('products.id', $productId)
            ->first();
    }

    public function get_detail_product_by_id($id)
    {
        return $this->select("products.id
            , products.name
            , products.created_at
            , products.category_id
            , categories.name AS category_name
            , products.is_active
            , products.image
            , products.description
            , product_prices.price
            , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '),'') AS images")
            ->join('images', "images.record_id = products.id AND images.type = 'product'", 'left')
            ->join('categories', "categories.id = products.category_id", 'left')
            ->join('product_prices', "product_prices.product_id = products.id AND product_prices.is_active = 1", 'left')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->where('products.id', $id)
            ->first();
    }

    public function get_products_with_category()
    {
        return $this->select("products.id
            , products.name
            , products.created_at
            , products.is_active
            , categories.name AS category_name")
            ->join('categories', "categories.id = products.category_id", 'left')
            ->where('products.is_active', 1)
            ->orderBy('products.created_at', 'DESC')
            ->findAll();
    }
}
