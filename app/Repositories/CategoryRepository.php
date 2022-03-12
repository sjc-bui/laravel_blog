<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function deleteCategory($categoryId)
    {
        Category::destroy($categoryId);
    }

    public function createCategory(array $category)
    {
        return Category::create($category);
    }

    public function getCategoryBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }
}
