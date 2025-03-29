<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description', 'is_active', 'created_by', 'updated_by'];

    protected $createdField  = 'created_at';

    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'description' => 'required|permit_empty',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Tên danh mục là bắt buộc',
            'min_length' => 'Tên danh mục phải có ít nhất 3 ký tự.',
            'max_length' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ],
        'description' => [
            'required' => 'Mô tả là bắt buộc',
        ]
    ];

    public function getCategoriesWithImages()
    {
        return $this->select("categories.id
            , categories.name
            , categories.description
            , categories.created_at
            , categories.is_active
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = categories.id', 'left')
            ->where('images.type', 'category')
            ->groupBy('categories.id')
            ->orderBy('categories.created_at', 'DESC')
            ->findAll();
    }

    public function deleteCategory($id)
    {
        return $this->delete($id);
    }

    public function getCategoriesWithImagesById($id)
    {
        $result =  $this->select("categories.id
        , categories.name
        , categories.description
        , categories.created_at
        , categories.is_active
        , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = categories.id', 'left')
            ->where("categories.id", $id)
            ->where('images.type', 'category')
            ->groupBy('categories.id')
            ->orderBy('categories.created_at', 'DESC')
            ->first();
        return $result;
    }
}
