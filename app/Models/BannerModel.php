<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table            = 'banners';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // or 'object' if you prefer objects
    protected $useSoftDeletes   = false;  // Change to true if you want soft deletes
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title',
        'description',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
        'is_active',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //protected $deletedField  = 'deleted_at'; //If using soft deletes
}
