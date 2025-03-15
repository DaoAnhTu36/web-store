<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers'; // Tên bảng
    protected $primaryKey = 'id'; // Khóa chính

    protected $allowedFields = ['name', 'email', 'phone', 'address', 'created_at', 'updated_at'];

    // Lấy danh sách nhà cung cấp
    public function getAllSuppliers()
    {
        return $this->findAll();
    }

    // Thêm nhà cung cấp mới
    public function addSupplier($data)
    {
        return $this->insert($data);
    }

    // Lấy nhà cung cấp theo ID
    public function getSupplierById($id)
    {
        return $this->find($id);
    }

    // Cập nhật nhà cung cấp
    public function updateSupplier($id, $data)
    {
        return $this->update($id, $data);
    }

    // Xóa nhà cung cấp
    public function deleteSupplier($id)
    {
        return $this->delete($id);
    }
}
