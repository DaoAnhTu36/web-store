<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'description',
        'created_at',
        'created_by',
        'updated_by',
        'is_active'
    ];

    public function getCategoriesWithImages()
    {
        return $this->select("categories.id
            , categories.name
            , categories.description
            , categories.created_at
            , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = categories.id', 'left')
            ->where('images.type', 'category')
            ->where('categories.is_active', true)
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
        , GROUP_CONCAT(images.image_path SEPARATOR ', ') AS images")
            ->join('images', 'images.record_id = categories.id', 'left')
            ->where("categories.id", $id)
            ->where('images.type', 'category')
            ->where('categories.is_active', true)
            ->groupBy('categories.id')
            ->orderBy('categories.created_at', 'DESC')
            ->first();
        return $result;
    }
}
