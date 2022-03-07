<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{

    public function getPublishPosts()
    {
        return Post::where('published', 1)->get();
    }

    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function createPost(array $post)
    {
        return Post::create($post);
    }

    public function deletePost($postId)
    {
        Post::destroy($postId);
    }

    public function updatePost($postId, array $post)
    {
        return Post::whereId($postId)->update($post);
    }
}
