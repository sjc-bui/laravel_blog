<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function createCategory(array $category);
    public function deleteCategory($categoryId);
    public function getCategoryBySlug($slug);
}
