<?php

namespace App\Interfaces;

use App\Models\Category;

interface CategoryInterface
{
    public function getAll();

    public function getCategoryById($id);

    public function createCategory(array $category);
    public function updateCategory($categoryId, array $category);
    public function deleteCategory($categoryId);
}
