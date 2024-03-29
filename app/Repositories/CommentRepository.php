<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    public function storeComment(array $comment)
    {
        return Comment::create($comment);
    }

    public function getRecentComments()
    {
        return Comment::inRandomOrder()->limit(5)->get();
    }

    public function deleteCommentsByPostId($postId)
    {
        Comment::where('post_id', $postId)->delete();
    }
}
