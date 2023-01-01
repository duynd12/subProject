<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductInterface
{
    public function getAll();

    public function getProductById($id);

    public function createProduct(array $product);
    public function updateProduct($productId, array $product);
    public function deleteProduct($productId);
}
