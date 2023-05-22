<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Post -> postsテーブル
class Post extends Model
{
    use HasFactory;

    // ホワイトリスト
    protected $fillable = [
        'title',
        'body'
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
