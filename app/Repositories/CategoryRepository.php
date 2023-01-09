<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryInterface
{
    public function getAll()
    {
        return Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::findOrFail($id);
    }

    public function createCategory(array $category)
    {
        return Category::create($category);
    }

    public function updateCategory($categoryId, array $category)
    {

        return Category::find($categoryId)->update($category);
    }

    public function deleteCategory($categoryId)
    {
        $category_id = Category::findOrFail($categoryId);
        return $category_id->delete();
    }

    public function getCateWithPaniator($quantity, $key = '')
    {
        $data = Category::where('title', 'like', '%' . $key . '%')->paginate($quantity);
        return $data;
    }

    public function deleteCategoryProduct($_id)
    {
        return DB::table('category_products')
            ->where('category_id', '=', $_id)
            ->delete();
    }
}
