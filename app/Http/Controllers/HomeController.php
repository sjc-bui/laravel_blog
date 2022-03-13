<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CommentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
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
            'content' => 'required|min:3'
        ]);

        $post = array(
            'title' => $request->title,
            'slug' => isset($request->slug) ? Str::slug($request->slug) : Str::slug($request->title),
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'published' => $request->has('published') ? 1 : 0,
            'content' => Str::markdown($request->content)
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

        DB::beginTransaction();
        try {
            $this->postRepository->deletePost($postId);
            $this->commentRepository->deleteCommentsByPostId($postId);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

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
            'content' => 'required|min:3'
        ]);

        $postId = $request->route('id');
        $post = array(
            'title' => $request->title,
            'slug' => isset($request->slug) ? Str::slug($request->slug) : Str::slug($request->title),
            'category_id' => $request->category_id,
            'published' => $request->has('published') ? 1 : 0,
            'content' => $request->content
        );

        $updatedPost = $this->postRepository->updatePost($postId, $post);

        return redirect(route('admin.posts.show', $postId));
    }
}
