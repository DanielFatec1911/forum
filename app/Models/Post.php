<?php
// app/Models/Post.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'category_id',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'idCategory');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function getImageAttribute($value)
    {
        return $value ? 'storage/' . $value : null;
    }
}
