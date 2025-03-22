<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductAttributeValueModel;

class ProductAttributeValueController extends BaseController
{
    protected $productAttributeValueModel;

    public function __construct()
    {
        helper("common");
        $this->productAttributeValueModel = new ProductAttributeValueModel();
    }

    public function getProductAttributeValue()
    {
        $product_id = $this->request->getPost('product_id');
        $product = $this->productAttributeValueModel
            ->select('product_attributes.attribute_name
            ,product_attributes.attribute_value')
            ->join('product_attributes', 'product_attributes.id = product_attribute_values.attribute_id', 'left')
            ->where('product_id', $product_id)
            ->where('product_attributes.is_active', 1)
            ->where('product_attribute_values.is_active', 1)
            ->findAll();
        return $this->response->setJSON($product);
    }
}
