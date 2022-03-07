<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'published'];

    public function owner() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function path() {
        return "admin/home/posts/{$this->id}";
    }
}
