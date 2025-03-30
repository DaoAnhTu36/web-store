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

    protected $validationRules = [
        'full_name' => 'required|min_length[3]|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'phone' => 'required|regex_match[/^[0-9]{10,20}$/]',
        'address' => 'required|string',
        'user_name' => 'required|alpha_numeric|max_length[255]|is_unique[accounts.user_name]',
        'role_id' => 'required|integer'
    ];

    protected $validationMessages = [
        'email' => [
            'required' => 'Email là bắt buộc.'
        ],
        'full_name' => [
            'required' => 'Họ và tên là bắt buộc.'
        ],
        'phone' => [
            'required' => 'Số điện thoại là bắt buộc.'
        ],
        'user_name' => [
            'is_unique' => 'Tên tài khoản đã tồn tại.',
            'required' => 'Tên tài khoản là bắt buộc.',
        ],
        'role_id' => [
            'required' => 'Chức vụ là bắt buộc.'
        ]
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
