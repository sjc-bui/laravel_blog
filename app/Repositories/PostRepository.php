<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function getPublishPosts()
    {
        return Post::where('published', 1)->orderBy('created_at', 'desc')->get();
    }

    public function getAllPosts()
    {
        return Post::orderBy('created_at', 'desc')->get();
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

    public function searchPosts($keyword)
    {
        return Post::where('published', 1)->orderBy('created_at', 'desc')->where('title', 'like', '%' . $keyword . '%')->get();
    }

    public function getPost($slug, $id)
    {
        return Post::where('slug', '=', $slug)->orWhere('id', '=', $id)->first();
    }

    public function getRelatedPosts($post)
    {
        return Post::where('published', 1)
            ->where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
    }
}
