<?php

// app/Models/Topic.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'category_id',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Adicione este método para definir o relacionamento com User
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'topic_tags', 'topic_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
