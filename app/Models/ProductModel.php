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
    ];
    protected $validationRules    = [
        'name'        => 'required|min_length[3]|max_length[255]',
        'category_id' => 'required|integer',
    ];

    protected $validationMessages = [
        'name' => [
            'required'   => 'Tên sản phẩm là bắt buộc.',
            'min_length' => 'Tên sản phẩm phải có ít nhất 3 ký tự.',
            'max_length' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
        ],
        'category_id' => [
            'required' => 'Danh mục sản phẩm là bắt buộc.',
        ],
    ];


    public function getProductsWithImages()
    {
        return $this->select("products.id
            , products.name
            , products.created_at
            , products.is_active
            , products.image
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
            , products.created_at
            , products.category_id
            , products.is_active
            , products.image
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = products.id', 'left')
            ->groupBy('products.id')
            ->orderBy('products.created_at', 'DESC')
            ->where('products.id', $productId)
            ->where('images.type', 'product')
            ->first();
    }
}
