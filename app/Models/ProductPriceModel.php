<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductPriceModel extends Model
{
    protected $table      = 'product_prices';
    protected $primaryKey = 'price_id';

    protected $allowedFields = ['product_id', 'price', 'start_date', 'end_date', 'created_at'];

    // Lấy giá mới nhất của mỗi sản phẩm
    public function getLatestPriceByProduct()
    {
        return $this->select('product_id, price, start_date, end_date')
            ->where('start_date = (SELECT MAX(start_date) FROM product_prices AS pp WHERE pp.product_id = product_prices.product_id)', null, false)
            ->groupBy('product_id')
            ->findAll();
    }

    // Lấy giá cao nhất của mỗi sản phẩm
    public function getHighestPriceByProduct()
    {
        return $this->select('product_id, MAX(price) as highest_price')
            ->groupBy('product_id')
            ->findAll();
    }

    // Lấy giá thấp nhất của mỗi sản phẩm
    public function getLowestPriceByProduct()
    {
        return $this->select('product_id, MIN(price) as lowest_price')
            ->groupBy('product_id')
            ->findAll();
    }

    // Lấy danh sách giá theo sản phẩm
    public function getPriceListByProduct()
    {
        return $this->select("product_prices.*, products.name as product_name, GROUP_CONCAT(product_prices.price ORDER BY product_prices.start_date DESC SEPARATOR ', ') as price_list")
            ->join("products", "products.id = product_prices.product_id", "left")
            ->groupBy('product_id')
            ->findAll();
    }
}
