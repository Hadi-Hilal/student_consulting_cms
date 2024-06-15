<?php

namespace Modules\Faq\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Faq extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['title', 'content'];
    protected $fillable = ['title', 'content', 'link', 'publish'];

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

}
