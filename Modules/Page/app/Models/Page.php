<?php

namespace Modules\Page\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'description', 'content', 'keywords'];
    protected $appends = ['image_link'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'type', 'publish', 'keywords', 'featured', 'visits'];

    public function scopeFeatured($q)
    {
        $q->where('publish', 'published')->where('featured', 1);
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
}
