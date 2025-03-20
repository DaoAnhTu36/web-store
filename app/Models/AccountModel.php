<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = "accounts";
    protected $primaryKey = "id";
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'full_name',
        'email',
        'password',
        'phone',
        'address',
        'status',
        'user_name',
        'created_by',
        'updated_by',
        'is_active',
        'role_id'
    ];

    public function getAllAccount()
    {
        return $this
            ->findAll();
    }

    public function updateStatus($id, $status)
    {
        $this->update($id, ['is_active' => $status]);
    }

    public function getAccountById($id)
    {
        return $this->where('id', $id)->first();
    }
}
