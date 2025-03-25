<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ProductDiscountModel;
use App\Models\DiscountModel;
use App\Models\ProductPriceModel;
use App\Models\ProductDiscountDetailModel;

class ProductDiscountController extends BaseController
{
    protected $productDiscountModel;
    protected $discountModel;
    protected $productPriceModel;
    protected $productDiscountDetailModel;

    public function __construct()
    {
        $this->productDiscountModel = new ProductDiscountModel();
        $this->discountModel = new DiscountModel();
        $this->productPriceModel = new ProductPriceModel();
        $this->productDiscountDetailModel = new ProductDiscountDetailModel();
    }

    public function index()
    {
        $data = $this->productDiscountModel
            ->select('product_discounts.id
                    , product_discounts.name
                    , product_discounts.is_active
                    , product_discounts.created_at
                    , discounts.name as discount_name
                    , discounts.start_date
                    , discounts.end_date
                    , discounts.used_count')
            ->join('discounts', 'discounts.id = product_discounts.discount_id', 'left')
            ->where('product_discounts.is_active', 1)
            ->where('discounts.is_active', 1)
            ->findAll();
        $data_view = [
            'title' => 'Danh sách sản phẩm khuyến mại',
            'data' => $data,
        ];
        return view('admin/product_discount_view/index_view', $data_view);
    }

    public function create()
    {
        $discounts = $this->discountModel
            ->where('is_active', 1)
            ->where('start_date <=', date('Y-m-d'))
            ->where('end_date >=', date('Y-m-d'))
            ->findAll();
        $products = $this->productPriceModel
            ->join('products', 'products.id = product_prices.product_id', 'left')
            ->where('products.is_active', 1)
            ->where('product_prices.is_active', 1)
            ->findAll();
        $data_view = [
            'title' => 'Thêm mới sản phẩm khuyến mại',
            'discounts' => $discounts,
            'products' => $products,
        ];
        return view('admin/product_discount_view/create_view', $data_view);
    }

    public function save()
    {
        $discount_id = $this->request->getPost('discount_id');
        $product_ids = $this->request->getPost('product_ids');
        $name = $this->request->getPost('name');
        if (empty($discount_id) || empty($product_ids)) {
            return redirect()->to('admin/product-discount/create')->with('errors', 'Vui lòng chọn chương trình khuyến mại và sản phẩm');
        }
        $product_discount_id = $this->productDiscountModel->insert([
            'name' => $name,
            'created_by' => session()->get('user_id'),
            'discount_id' => $discount_id,
        ]);
        if (is_array($product_ids) && $product_discount_id > 0) {
            foreach ($product_ids as $product_id) {
                $data = [
                    'product_id' => $product_id,
                    'product_discount_id' => $product_discount_id,
                    'created_by' => session()->get('user_id'),
                ];
                $this->productDiscountDetailModel->save($data);
            }
        }
        return redirect()->to('admin/product-discount/create')->with('success', 'Thêm mới thành công sản phẩm khuyến mại');
    }

    public function detail($id)
    {
        $product_discounts = $this->productDiscountModel
            ->select('product_discounts.id as product_discount_id
            , product_discounts.name as product_discount_name
            , product_discounts.discount_id
            , product_discount_details.product_id')
            ->join('product_discount_details', 'product_discounts.id = product_discount_details.product_discount_id', 'left')
            ->where('product_discount_details.is_active', 1)
            ->where('product_discounts.is_active', 1)
            ->where('product_discounts.id', $id)
            ->findAll();
        $discounts = $this->discountModel
            ->where('is_active', 1)
            ->where('start_date <=', date('Y-m-d'))
            ->where('end_date >=', date('Y-m-d'))
            ->findAll();
        $products = $this->productPriceModel
            ->join('products', 'products.id = product_prices.product_id', 'left')
            ->where('products.is_active', 1)
            ->where('product_prices.is_active', 1)
            ->findAll();
        $data_view = [
            'title' => 'Chi tiết sản phẩm khuyến mại',
            'product_discounts' => $product_discounts,
            'discounts' => $discounts,
            'products' => $products,
        ];
        return view('admin/product_discount_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $discount_id = $this->request->getPost('discount_id');
        $name = $this->request->getPost('name');
        if (empty($discount_id) || empty($name)) {
            return redirect()->to('admin/product-discount/create')->with('errors', 'Vui lòng chọn chương trình khuyến mại');
        }
        $data_update_product_discount = [
            'name' => $name,
            'discount_id' => $discount_id,
            'updated_by' => session()->get('user_id'),
        ];
        $this->productDiscountModel->update($id, $data_update_product_discount);
        return redirect()->to('admin/product-discount')->with('success', 'Cập nhật thành công sản phẩm khuyến mại');
    }

    public function delete($id)
    {
        $discountType = $this->productDiscountModel->find($id);
        if ($discountType) {
            $this->productDiscountModel->delete($id);
        }
        return redirect()->to('admin/product-discount')->with('success', 'Xóa sản phẩm khuyến mại thành công');
    }

    public function updateProductDiscountedDetail()
    {
        $product_discount_id = $this->request->getPost('product_discount_id');
        $product_id = $this->request->getPost('product_id');
        $product_discount_detail_info = $this->productDiscountDetailModel
            ->where('product_id', $product_id)
            ->where('product_discount_id', $product_discount_id)
            ->first();
        if ($product_discount_detail_info) {
            $data_update = [
                'is_active' => $product_discount_detail_info['is_active'] == 1 ? 0  : 1,
            ];
            $this->productDiscountDetailModel->update($product_discount_detail_info['id'], $data_update);
        } else {
            $data = [
                'product_id' => $product_id,
                'product_discount_id' => $product_discount_id,
                'created_by' => session()->get('user_id'),
            ];
            $this->productDiscountDetailModel->save($data);
        }
        return apiResponse(true, 'Cập nhật thành công sản phẩm khuyến mại', null, 200);
    }
}
