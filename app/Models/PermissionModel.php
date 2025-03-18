<?php
// app/Models/PermissionModel.php
namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name',
        'created_at',
        'is_active',
        'created_by',
        'updated_by'
    ];
    public $timestamps = false;
}
