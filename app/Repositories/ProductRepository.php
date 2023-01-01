<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface
{
    public function getAll()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function createProduct(array $product)
    {
        return Product::create($product);
    }

    public function updateProduct($productId, array $product)
    {

        return Product::find($productId)->update($product);
    }

    public function deleteProduct($productId)
    {
        $product_id = Product::findOrFail($productId);
        return $product_id->delete();
    }
}
