<?php

namespace Modules\Team\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Team extends Model
{
    use HasFactory;

    use HasTranslations;

    public $translatable = ['name', 'position'];
    protected $appends = ['image'];
    protected $fillable = ['name', 'position', 'publish', 'avatar'];

    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

    public function getImageAttribute()
    {
        if ($this->attributes['avatar']) {
            $path = asset('storage/' . $this->attributes['avatar']);
        } else {
            $path = asset('images/blank.png');
        }
        return $path;
    }

}
