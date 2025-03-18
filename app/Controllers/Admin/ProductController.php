<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BestSellingProductModel;
use App\Models\ProductPriceModel;
use App\Models\ProductDiscountModel;

class ProductController extends BaseController
{
    protected $bestSellingModel;
    protected $priceModel;
    protected $discountModel;
    public function __construct()
    {
        helper("common");
        helper("language");
        $this->bestSellingModel = new BestSellingProductModel();
        $this->priceModel = new ProductPriceModel();
        $this->discountModel = new ProductDiscountModel();
    }

    public function index()
    {
        $model = new \App\Models\ProductModel();
        $data = $model->getProductsWithImages();
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
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll();
        return view('admin/product_view/add_view', [
            'controller' => 'Product',
            'method' => 'Create',
            'title' => 'Thêm mới sản phẩm',
            'data' => $categories,
        ]);
    }

    public function save()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'category_id' => 'required',
            // 'images' => 'uploaded[images]|max_size[images,2048]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
            'images' => 'uploaded[images]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $productModel = new \App\Models\ProductModel();
        $productId = $productModel->insert([
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
        ]);

        $files = $this->request->getFiles();
        $image_list = [];
        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    array_push($image_list, $newName);
                    $img->move('uploads/', $newName);

                    $imageModel = new \App\Models\ImageModel();
                    $imageModel->insert([
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
            $productModel->update($productId, $data_update);
        }

        return redirect()->to('admin/product/create')->with('success', 'Sản phẩm đã được thêm!');
    }

    public function delete($id)
    {
        $model = new \App\Models\ProductModel();
        $model->where('id', $id)->delete();
        return redirect()->to('admin/product')->with('success', 'Sản phẩm đã được xóa!');
    }

    public function detail($id)
    {
        $model = new \App\Models\ProductModel();
        $item = $model->getProductsWithImagesByProductId($id);
        $categoryModel = new \App\Models\CategoryModel();
        $categories = $categoryModel->findAll();
        $data_view = [
            'title' => 'Chi tiết sản phẩm',
            'data' => $item,
            'categories' => $categories
        ];
        return view('admin/product_view/detail_view', $data_view);
    }

    public function update($id)
    {
        $model = new \App\Models\ProductModel();
        $item = $model->find($id);
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
        $data = $this->priceModel->getPriceListByProduct();
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
}
