<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function __construct()
    {
        helper("common");
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

    public function createView()
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

    public function createMethod()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[3]',
            'price' => 'required|decimal',
            'stock' => 'required|integer',
            'category_id' => 'required',
            'description_record' => 'required',
            // 'images' => 'uploaded[images]|max_size[images,2048]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
            'images' => 'uploaded[images]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $productModel = new \App\Models\ProductModel();
        $productId = $productModel->insert([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'description' => $this->request->getPost('description_record'),
        ]);

        $files = $this->request->getFiles();
        if ($files) {
            foreach ($files['images'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $img->move('uploads/', $newName);

                    $imageModel = new \App\Models\ImageModel();
                    $imageModel->insert([
                        'record_id' => $productId,
                        'image_path' => 'uploads/' . $newName,
                    ]);
                }
            }
        }

        return redirect()->to('admin/product/createView')->with('success', 'Sản phẩm đã được thêm!');
    }

    public function deleteViewMethod($id)
    {
        $model = new \App\Models\ProductModel();
        $model->where('id', $id)->delete();
        return redirect()->to('admin/product')->with('success', 'Sản phẩm đã được xóa!');
    }

    public function detailView($id)
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
        return view('admin/product_view/update_view', $data_view);
    }

    public function updateView($id)
    {
        $model = new \App\Models\ProductModel();
        $item = $model->find($id);
        EchoCommon($item);
    }

    public function updateMethod($id)
    {
        $model = new \App\Models\ProductModel();
        $item = $model->find($id);
        EchoCommon($item);
    }
}
