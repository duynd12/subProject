<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Image;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface
{
    public function getAll()
    {
        return Product::all();
    }
    public function getProductWithPaginator($quantity, $key = '')
    {
        $data = Product::where('name', 'like', '%' . $key . '%')->paginate($quantity);
        return $data;
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function createProduct(array $product)
    {
        return Product::create($product);
    }

    public function createImageProduct(array $image_product)
    {
        return Image::create($image_product);
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
    public function deleteCategoryProduct($_id)
    {
        return DB::table('category_products')
            ->where('product_id', '=', $_id)
            ->delete();
    }
    public function createCategoryProduct(array $category_product)
    {
        return CategoryProduct::create($category_product);
    }
    public function deleteImageProduct($product_id)
    {
        return DB::table('images')
            ->where('product_id', '=', $product_id)
            ->delete();
    }
}
