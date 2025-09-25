<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'user_id',
        // 'image',
        'title',
        'slug',
        'content',
        'category_id',
        'published_at',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);
        $this
            ->addMediaConversion('large')
            ->width(1200);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function claps()
    {
        return $this->hasMany(Clap::class);
    }

    public function readTime($wordPerMinute = 100)
    {
        $word_count = str_word_count(strip_tags($this->content));
        $minutes = ceil($word_count / $wordPerMinute);

        return max(1, $minutes);
    }

    public function imgUrl($conversionName = '')
    {
        return $this->getFirstMedia()?->getUrl($conversionName);
    }
}
