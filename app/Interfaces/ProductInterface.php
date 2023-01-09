<?php

namespace App\Interfaces;

interface ProductInterface
{
    public function getAll();

    public function getProductById($id);
    public function getProductWithPaginator($quantity, $key);

    public function createProduct(array $product);
    public function createImageProduct(array $product);

    public function updateProduct($productId, array $product);
    public function deleteProduct($productId);
    public function deleteCategoryProduct($productId);
    public function deleteImageProduct($product_id);
}
