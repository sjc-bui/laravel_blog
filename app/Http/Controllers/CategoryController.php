<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all categories
     *
     */
    public function categories()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Delete category by id.
     *
     */
    public function destroy(Request $request)
    {
        $categoryId = $request->route('id');
        $this->categoryRepository->deleteCategory($categoryId);
        return back();
    }

    /**
     * Store category.
     * 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:50|unique:categories'
        ]);

        $category = array(
            'title' => $request->title,
            'slug' => Str::slug($request->title)
        );

        $this->categoryRepository->createCategory($category);

        return back()->with('success', 'Category was added.');
    }
}
