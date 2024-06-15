<?php

namespace Modules\Blog\Models;

use App\Models\User;
use Bookworm\Bookworm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations;

class BlogPost extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'content', 'keywords'];
    protected $appends = ['image_link', 'estimated_time'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'category_id', 'publish', 'keywords', 'featured', 'visits'];
    protected $with = ['category'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->created_by = Auth::id();
        });
    }

    public function scopeFeatured($q)
    {
        $q->where('publish', 'published')->where('featured', 1);
    }

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

    public function scopeCardData($q)
    {
        $q->select('id', 'slug', 'title', 'description', 'category_id', 'image', 'content', 'visits', 'created_at', 'publish', 'featured');
    }

    public function getImageLinkAttribute()
    {
        if ($this->attributes['image']) {
            $path = asset('storage/' . $this->attributes['image']);
        } else {
            $path = asset('images/blank.png');
        }
        return $path;
    }

    public function getEstimatedTimeAttribute()
    {
        return Bookworm::estimate($this->attributes['content']);
    }

    public function scopeFilter($q)
    {
        if (request()->has('category')) {
            $category = BlogCategory::whereSlug(request()->query('category'))->first();
            if ($category) {
                $q->where('category_id', $category->id);
            }
        }

    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class)->withDefault();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
