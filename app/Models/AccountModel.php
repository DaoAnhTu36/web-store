<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = "accounts";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['full_name', 'email', 'password', 'phone', 'address', 'role', 'status', 'user_name', 'created_by', 'updated_by', 'is_active'];

    public function getAllAccountByRole($role)
    {
        return $this
            ->where('role', $role)
            ->where('is_active', true)
            ->findAll();
    }
}
