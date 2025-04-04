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
        ],
        'description' => [
            'required' => 'Mô tả là bắt buộc',
        ]
    ];

    public function get_category_with_image()
    {
        return $this->select("categories.id
            , categories.name
            , categories.description
            , categories.created_at
            , categories.is_active
            , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '),'') AS images")
            ->join('images', "images.record_id = categories.id AND images.type = 'category'", 'left')
            ->groupBy('categories.id')
            ->orderBy('categories.created_at', 'DESC')
            ->findAll();
    }

    public function delete_category($id)
    {
        return $this->delete($id);
    }

    public function get_category_with_image_by_id($id)
    {
        $result =  $this->select("categories.id
        , categories.name
        , categories.description
        , categories.created_at
        , categories.is_active
        , IFNULL(GROUP_CONCAT(images.image_path SEPARATOR ', '),'') AS images")
            ->join('images', "images.record_id = categories.id AND images.type = 'category'", 'left')
            ->where("categories.id", $id)
            ->groupBy('categories.id')
            ->orderBy('categories.created_at', 'DESC')
            ->first();
        return $result;
    }

    public function get_all_category()
    {
        return $this->select("categories.id, categories.name, categories.description, categories.created_at, categories.is_active")
            ->where('categories.is_active', 1)
            // ->orderBy('categories.created_at', 'DESC')
            ->findAll();
    }
}
