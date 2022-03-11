<?php

namespace App\Interfaces;

interface CommentRepositoryInterface
{
    public function storeComment(array $comment);
}
