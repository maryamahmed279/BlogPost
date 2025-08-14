<?php

namespace App\Models;

use App\Policies\PostPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
#[UsePolicy(PostPolicy::class)]
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
   public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
