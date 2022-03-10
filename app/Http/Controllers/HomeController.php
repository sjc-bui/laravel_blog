<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Str;

class HomeController extends Controller
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
    public function index()
    {
        $posts = $this->postRepository->getAllPosts();
        return view('admin.posts.home', compact('posts'));
    }

    /**
     * Show post detail
     *
     */
    public function show(Request $request)
    {
        $postId = $request->route('id');
        $post = $this->postRepository->getPostById($postId);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show post create form
     *
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store post to storage.
     * 
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'category_id' => 'required|integer',
            'published' => 'boolean',
            'content' => 'required|min:3|max:255'
        ]);

        $post = array(
            'title' => $request->title,
            'slug' => isset($request->slug) ? $request->slug : Str::slug($request->title),
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'published' => $request->has('published') ? 1 : 0,
            'content' => $request->content
        );

        $newPost = $this->postRepository->createPost($post);
        return redirect($newPost->path());
    }

    /**
     * Delete post.
     * 
     */
    public function destroy(Request $request)
    {
        $postId = $request->route('id');
        $this->postRepository->deletePost($postId);
        return redirect(route('admin.posts.index'));
    }

    /**
     * Show update view.
     * 
     */
    public function edit(Request $request)
    {
        $postId = $request->route('id');
        $post = $this->postRepository->getPostById($postId);
        $categories = $this->categoryRepository->getAllCategories();
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    /**
     * Update post.
     * 
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'category_id' => 'required|integer',
            'published' => 'boolean',
            'content' => 'required|min:3|max:255'
        ]);

        $postId = $request->route('id');
        $post = array(
            'title' => $request->title,
            'slug' => isset($request->slug) ? $request->slug : Str::slug($request->title),
            'category_id' => $request->category_id,
            'published' => $request->has('published') ? 1 : 0,
            'content' => $request->content
        );

        $updatedPost = $this->postRepository->updatePost($postId, $post);

        return redirect(route('admin.posts.show', $postId));
    }
}
