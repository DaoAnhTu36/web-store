<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BestSellingProductModel;
use App\Models\ProductPriceModel;
use App\Models\ProductAttributeModel;
use App\Models\ProductAttributeValueModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;
use App\Models\TransactionDetailModel;

class ProductController extends BaseController
{
    protected $bestSellingModel;
    protected $productPriceModel;
    protected $productAttributeModel;
    protected $productAttributeValueModel;
    protected $productModel;
    protected $categoryModel;
    protected $imageModel;
    protected $transactionDetailModel;

    public function __construct()
    {
        $this->bestSellingModel = new BestSellingProductModel();
        $this->productPriceModel = new ProductPriceModel();
        $this->productAttributeModel = new ProductAttributeModel();
        $this->productAttributeValueModel = new ProductAttributeValueModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->imageModel = new ImageModel();
        $this->transactionDetailModel = new TransactionDetailModel();
    }

    public function index()
    {
        $data = $this->productModel->get_product_with_image();
        $data_view = [
            'title' => 'Danh sách sản phẩm',
            'controller' => 'Product',
            'method' => 'Index',
            'data' => $data,
        ];

        return view('admin/product_view/index_view', $data_view);
    }

    public function create()
    {
        $categories = $this->categoryModel->findAll();
        $productAttributes = $this->productAttributeModel->get_attribute_group_by_name();
        return view('admin/product_view/create_view', [
            'controller' => 'Product',
            'method' => 'Create',
            'title' => 'Thêm mới sản phẩm',
            'data' => $categories,
            'productAttributes' => $productAttributes,
        ]);
    }

    public function save()
    {
        $attrs = $this->request->getPost('attribute_ids');
        $name = $this->request->getPost('name');
        $category_id = $this->request->getPost('category_id');
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->productModel->validationRules;
        $messages = $this->productModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $productId = $this->productModel->insert([
            'name' => $name,
            'category_id' => $category_id,
            'created_by' => session()->get('user_id'),
            'updated_by' => session()->get('user_id'),
            'is_active' => 1,
        ]);
        $image_array = $this->imageModel->upload_image($files, $productId, 'product', $name);
        $this->productModel->update($productId, ['image' => $image_array[0]]);
        if (is_array($attrs) && count($attrs) > 0) {
            $this->productAttributeValueModel->delete_attribute_value($productId);
            foreach ($attrs as $attr) {
                $dtProductAttributeValue = [
                    'product_id' => $productId,
                    'attribute_id' => $attr,
                    'created_by' => session()->get('user_id'),
                    'updated_by' => session()->get('user_id'),
                    'is_active' => 1,
                ];
                $this->productAttributeValueModel->insert($dtProductAttributeValue);
            }
        }
        return redirect()->to('admin/product')->with('success', 'Sản phẩm đã được thêm!');
    }

    public function delete($id)
    {
        $this->productModel->where('id', $id)->delete();
        $this->productAttributeValueModel->delete_attribute_value($id);
        $this->imageModel->delete_image($id, 'product');
        return redirect()->to('admin/product')->with('success', 'Sản phẩm đã được xóa!');
    }

    public function detail($id)
    {
        $product_attributes = $this->productAttributeModel->get_attribute_group_by_name();
        $item = $this->productModel->get_product_with_image_by_id($id);
        $categories = $this->categoryModel->findAll();
        $product_attribute_values = array_column($this->productAttributeValueModel->get_product_attribute_value($id), 'attribute_id');
        $data_view = [
            'title' => 'Chi tiết sản phẩm',
            'data' => $item,
            'categories' => $categories,
            'product_attributes' => $product_attributes,
            'product_attribute_values' => $product_attribute_values,
        ];
        return view('admin/product_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $attrs = $this->request->getPost('attribute_ids');
        $name = $this->request->getPost('name');
        $category_id = $this->request->getPost('category_id');
        $files = $this->request->getFiles();
        $check_validate_files = get_validate_upload_file($files);
        $rules = $this->productModel->validationRules;
        $messages = $this->productModel->validationMessages;
        if (!empty($check_validate_files)) {
            $rules['images'] = $check_validate_files;
            $messages['images'] = get_message_error_file();
        }
        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $this->productModel->update($id, [
            'name' => $name,
            'category_id' => $category_id,
            'updated_by' => session()->get('user_id'),
        ]);
        $image_array = $this->imageModel->upload_image($files, $id, 'product', $name);
        $this->productModel->update($id, ['image' => $image_array[0]]);
        if (is_array($attrs) && count($attrs) > 0) {
            $this->productAttributeValueModel->delete_attribute_value($id);
            foreach ($attrs as $attr) {
                $dtProductAttributeValue = [
                    'product_id' => $id,
                    'attribute_id' => $attr,
                    'created_by' => session()->get('user_id'),
                    'updated_by' => session()->get('user_id'),
                    'is_active' => 1,
                ];
                $this->productAttributeValueModel->insert($dtProductAttributeValue);
            }
        }
        return redirect()->to('admin/product')->with('success', 'Sản phẩm đã được cập nhật');
    }

    public function bestSellingProduct()
    {
        $data = $this->bestSellingModel->getTopSellingProducts();
        $data_view = [
            'title' => 'Danh sách sản phẩm bán chạy',
            'data' => $data,
        ];
        return view('admin/product_view/best_selling_product_view', $data_view);
    }

    public function priceProductManagement()
    {
        $data = $this->productPriceModel->getProductsPrice();
        $data_view = [
            'title' => 'Danh sách giá sản phẩm',
            'data' => $data,
        ];
        return view('admin/product_view/price_product_view', $data_view);
    }

    public function setPriceProduct()
    {
        try {
            $product_id = $this->request->getPost('product_id');
            $price = $this->request->getPost('price');
            if (empty($product_id)) {
                return apiResponse(false, 'Vui lòng chọn sản phẩm!', null, '400');
            }
            if (empty($price)) {
                return apiResponse(false, 'Vui lòng nhập giá!', null, '400');
            }
            $checkExist = $this->productPriceModel
                ->where('product_id', $product_id)
                ->findAll();
            if (count($checkExist) > 0) {
                foreach ($checkExist as $check) {
                    $this->productPriceModel->update($check['id'], ['is_active' => 0]);
                }
            }
            $this->productPriceModel->insert([
                'product_id' => $product_id,
                'price' => $price,
                'created_by' => session()->get('user_id'),
                'updated_by' => session()->get('user_id'),
                'is_active' => 1,
            ]);
            return apiResponse(true, 'Thiết lập thành công', null, '200');
        } catch (\Throwable $th) {
            return apiResponse(true, $th->getMessage(), null, '200');
        }
    }

    public function showHistoryPrice()
    {
        try {
            $product_id = $this->request->getPost('product_id');
            $price_product_prices = $this->productPriceModel
                ->select('price, created_at, is_active')
                ->where('product_id', $product_id)
                ->orderBy('created_at', 'DESC')
                ->findAll();
            $price_transaction_detail = $this->transactionDetailModel
                ->select('unit_price as price, created_at, is_active')
                ->where('product_id', $product_id)
                ->orderBy('created_at', 'DESC')
                ->findAll();
            $result = [
                'price_transaction_detail' => $price_transaction_detail,
                'price_product_prices' => $price_product_prices,
            ];
            return apiResponse(true, 'Fetch data successful', $result);
        } catch (\Throwable $th) {
            return apiResponse(true, $th->getMessage(), null, '200');
        }
    }
}
