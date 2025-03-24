<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BestSellingProductModel;
use App\Models\ProductPriceModel;
use App\Models\ProductDiscountModel;
use App\Models\ProductAttributeModel;
use App\Models\ProductAttributeValueModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\ImageModel;

class ProductController extends BaseController
{
    protected $bestSellingModel;
    protected $productPriceModel;
    protected $discountModel;
    protected $productAttributeModel;
    protected $productAttributeValueModel;
    protected $productModel;
    protected $categoryModel;
    protected $imageModel;

    public function __construct()
    {
        helper("common");
        helper("language");
        $this->bestSellingModel = new BestSellingProductModel();
        $this->productPriceModel = new ProductPriceModel();
        $this->discountModel = new ProductDiscountModel();
        $this->productAttributeModel = new ProductAttributeModel();
        $this->productAttributeValueModel = new ProductAttributeValueModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->imageModel = new ImageModel();
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
            // 'images' => 'uploaded[images]|max_size[images,2048]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
            'images' => 'uploaded[images]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
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
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    array_push($image_list, $newName);
                    $img->move('uploads/', $newName);
                    $this->imageModel->insert([
                        'record_id' => $productId,
                        'image_path' => 'uploads/' . $newName,
                        'type' => 'product',
                    ]);
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
        $data = $this->productPriceModel->getPriceListByProduct();
        $data_view = [
            'title' => 'Danh sách giá sản phẩm',
            'data' => $data,
        ];
        return view('admin/product_view/price_product_view', $data_view);
    }

    public function discountProductManagement()
    {
        $data = $this->discountModel->getAllDiscount();
        $data_view = [
            'title' => 'Danh sách sản phẩm giảm giá',
            'data' => $data,
        ];
        return view('admin/product_view/discount_product_view', $data_view);
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
                    $this->productPriceModel->update($check['price_id'], ['is_active' => 0]);
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
}
