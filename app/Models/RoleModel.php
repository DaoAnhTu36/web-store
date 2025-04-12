<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'created_at',
        'is_active',
        'created_by',
        'updated_by',
        'updated_at'
    ];
    public $timestamps = false;
}
