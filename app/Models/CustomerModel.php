<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'phone', 'address', 'created_at', 'updated_at'];

    public function getAllCustomers()
    {
        return $this->findAll();
    }

    public function addCustomer($data)
    {
        return $this->insert($data);
    }

    public function getCustomerById($id)
    {
        return $this->find($id);
    }

    public function updateCustomer($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCustomer($id)
    {
        return $this->delete($id);
    }
}
