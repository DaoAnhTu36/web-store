<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = "accounts";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = ['full_name', 'email', 'password', 'phone', 'address', 'role', 'status', 'user_name'];

    public function getAllAccountByRole($role)
    {
        return $this->where('role', $role)->findAll();
    }
}
