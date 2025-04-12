<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'created_by',
        'updated_by',
        'is_active',
        'sub_total'
    ];

    protected $returnType = 'array';


    public function get_order_detail($id)
    {
        return $this
            ->select('order_details.order_id,
            order_details.price,
            order_details.quantity,
            order_details.sub_total,
            products.name as product_name,
            orders.status as order_status
            ')
            ->where('order_id', $id)
            ->join('products', 'order_details.product_id = products.id')
            ->join('orders', 'order_details.order_id = orders.id')
            ->findAll();
    }
}
