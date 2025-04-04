<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscountModel extends Model
{
    protected $table            = 'discounts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = [
        'name',
        'discount_type_id',
        'discount_value',
        'min_order_amount',
        'max_discount',
        'coupon_code',
        'start_date',
        'end_date',
        'usage_limit',
        'used_count',
        'is_active',
        'created_by',
        'updated_by'
    ];

    protected $validationRules = [
        'name' => 'required',
        'discount_type_id' => 'required',
        'discount_value' => 'required',
        'min_order_amount' => 'required',
        'max_discount' => 'required',
        'coupon_code' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'usage_limit' => 'required',
    ];

    protected $validationMessages = [
        'name' => [
            'required' => 'Tên chương trình khuyến mại là bắt buộc',
        ],
        'discount_type_id' => [
            'required' => 'Loại khuyến mại là bắt buộc',
        ],
        'discount_value' => [
            'required' => 'Giá trị là bắt buộc',
        ],
        'min_order_amount' => [
            'required' => 'Giá trị tối thiểu đơn hàng là bắt buộc',
        ],
        'max_discount' => [
            'required' => 'Giá trị tối đa là bắt buộc',
        ],
        'coupon_code' => [
            'required' => 'Mã giảm giá là bắt buộc',
        ],
        'start_date' => [
            'required' => 'Thời gian bắt đầu là bắt buộc',
        ],
        'end_date' => [
            'required' => 'Thời gian kết thúc là bắt buộc',
        ],
        'usage_limit' => [
            'required' => 'Số lượng giới hạn là bắt buộc',
        ],
    ];

    // Timestamps xử lý tự động
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function get_discount_alive()
    {
        return $this
            ->select('
                product_discount_details.product_id
                , discounts.id as discount_id
                , discounts.name as discount_name
                , discounts.discount_value
                , discounts.min_order_amount
                , discounts.max_discount
                , discounts.coupon_code
                , discounts.start_date
                , discounts.end_date
                , discounts.usage_limit
                , discounts.used_count
                , discount_types.name as discount_type_name
                , discount_types.id as discount_type_id
                ')
            ->join('product_discounts', 'discounts.id = product_discounts.discount_id AND product_discounts.is_active = 1')
            ->join('discount_types', 'discounts.discount_type_id = discount_types.id AND discount_types.is_active = 1')
            ->join('product_discount_details', 'product_discounts.id = product_discount_details.product_discount_id AND product_discount_details.is_active = 1')
            ->where('discounts.is_active', 1)
            ->where('discounts.start_date <=', date('Y-m-d H:i:s'))
            ->where('discounts.end_date >=', date('Y-m-d H:i:s'))
            ->findAll();
    }

    public function get_discount_by_product_id($product_id)
    {
        return $this->where('product_id', $product_id)->findAll();
    }
}
