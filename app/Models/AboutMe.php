<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'sns', 'link', 'intro'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
