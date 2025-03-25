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
        $data = $this->productModel->getProductsWithImages();
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
        $productAttributes = $this->productAttributeModel->getAttributeGroupByName();
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
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'category_id' => 'required',
            'attribute_ids' => 'required',
            'images' => 'uploaded[images]|max_size[images,150]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
            // 'images' => 'uploaded[images]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', implode(' ', $validation->getErrors()));
        }

        $productId = $this->productModel->insert([
            'name' => $name,
            'category_id' => $category_id,
            'created_by' => session()->get('user_id'),
            'updated_by' => session()->get('user_id'),
            'is_active' => 1,
        ]);

        $files = $this->request->getFiles();
        $image_list = [];
        if ($files) {
            $index = 1;
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = convert_vi_to_slug($name) . '-' . $index;
                    array_push($image_list, $newName);
                    $img->move('uploads/', $newName);
                    $this->imageModel->insert([
                        'record_id' => $productId,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'product',
                    ]);
                    $index++;
                }
            }
        }

        if (count($image_list) > 0) {
            $data_update = [
                'image' => 'uploads/' . reset($image_list)
            ];
            $this->productModel->update($productId, $data_update);
        }

        if (is_array($attrs) && count($attrs) > 0) {
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

        return redirect()->to('admin/product/create')->with('success', 'Sản phẩm đã được thêm!');
    }

    public function delete($id)
    {
        $this->productModel->where('id', $id)->delete();
        return redirect()->to('admin/product')->with('success', 'Sản phẩm đã được xóa!');
    }

    public function detail($id)
    {
        $item = $this->productModel->getProductsWithImagesByProductId($id);
        $categories = $this->categoryModel->findAll();
        $data_view = [
            'title' => 'Chi tiết sản phẩm',
            'data' => $item,
            'categories' => $categories
        ];
        return view('admin/product_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $item = $this->productModel->find($id);
        EchoCommon($item);
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
