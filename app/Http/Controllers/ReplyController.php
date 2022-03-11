<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;

class ReplyController extends Controller
{
    /**
     * Store reply.
     *
     */
    public function store(Comment $comment)
    {
        $this->validate(request(), [
            'content' => 'required|min:3'
        ]);

        $comment->replies()->create([
            'user_id' => auth()->id(),
            'content' => request()->content
        ]);

        return redirect()->back();
    }
}
