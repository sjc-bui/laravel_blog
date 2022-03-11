<?php

namespace App\Http\Controllers;

use App\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    private CommentRepositoryInterface $commentRepository;

    public function __construct(
        CommentRepositoryInterface $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Store comment.
     * 
     */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'content' => 'required|min:3',
        ]);

        $post->comments()->create([
            'name' => request()->name,
            'email' => request()->email,
            'content' => request()->content
        ]);

        return redirect()->back();
    }
}
