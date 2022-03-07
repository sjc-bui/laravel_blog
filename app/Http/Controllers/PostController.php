<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;
    private CategoryRepositoryInterface $categoryRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = $this->postRepository->getPublishPosts();
        $categories = $this->categoryRepository->getAllCategories();

        return view('posts.posts', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
}
