<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'published_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function readTime($wordPerMinute = 100)
    {
        $word_count = str_word_count(strip_tags($this->content));
        $minutes = ceil($word_count / $wordPerMinute);

        return max(1, $minutes);
    }

    public function imgUrl()
    {
        if ($this->image) {
            return Storage::url($this->image);
        }

        return null; // Return null if no image is set
    }
}
