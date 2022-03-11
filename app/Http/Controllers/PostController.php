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
    ) {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $posts = $this->postRepository->getPublishPosts();
        $categories = $this->categoryRepository->getAllCategories();

        return view('posts.posts', [
            'posts' => $posts,
            'categories' => $categories
        ]);
    }

    /**
     * Show detail of single post.
     *
     */
    public function show(Request $request)
    {
        $slug = $request->route('slug');
        $id = $request->route('id');

        $categories = $this->categoryRepository->getAllCategories();

        $post = $this->postRepository->getPost($slug, $id);

        return view('posts.show', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Search post by title.
     *
     */
    public function search(Request $request)
    {
        $q = $request->input('q');
        $posts = $this->postRepository->searchPosts($q);
        $categories = $this->categoryRepository->getAllCategories();

        return view('posts.posts', [
            'posts' => $posts,
            'categories' => $categories,
            'q' => $q
        ]);
    }
}
