<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;

class PostController extends Controller
{
    private PostRepositoryInterface $postRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private CommentRepositoryInterface $commentRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        PostRepositoryInterface $postRepository,
        CategoryRepositoryInterface $categoryRepository,
        CommentRepositoryInterface $commentRepository
    ) {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->commentRepository = $commentRepository;
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
        $recentComments = $this->commentRepository->getRecentComments();

        return view('posts.posts', [
            'posts' => $posts,
            'categories' => $categories,
            'recentComments' => $recentComments
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

        $post = $this->postRepository->getPost($slug, $id);
        $categories = $this->categoryRepository->getAllCategories();
        $recentComments = $this->commentRepository->getRecentComments();
        $relatedPosts = $this->postRepository->getRelatedPosts($post);

        return view('posts.show', [
            'post' => $post,
            'categories' => $categories,
            'recentComments' => $recentComments,
            'relatedPosts' => $relatedPosts
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
        $recentComments = $this->commentRepository->getRecentComments();

        return view('posts.posts', [
            'posts' => $posts,
            'categories' => $categories,
            'q' => $q,
            'recentComments' => $recentComments
        ]);
    }
}
