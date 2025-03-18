<?php
// app/Models/PermissionModel.php
namespace App\Models;

use CodeIgniter\Model;

class PermissionModel extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['permission_name', 'created_at'];
    public $timestamps = false;
}
