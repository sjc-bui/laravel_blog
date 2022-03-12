<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function getPublishPosts();
    public function getAllPosts();
    public function getPostById($id);
    public function createPost(array $post);
    public function deletePost($postId);
    public function updatePost($postId, array $post);
    public function searchPosts($keyword);
    public function getPost($slug, $id);
    public function getRelatedPosts($post);
    public function getNextPost($postId);
    public function getPrevPost($postId);
    public function getPostsByCategory($categoryId);
}
