<?php
// app/Models/RolePermissionModel.php
namespace App\Models;

use CodeIgniter\Model;

class RolePermissionModel extends Model
{
    protected $table = 'role_permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'role_id',
        'permission_id',
        'is_active',
        'created_by',
        'updated_by',
        'updated_at'
    ];
    public $timestamps = false;
}
