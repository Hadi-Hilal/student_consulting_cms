<?php

namespace Modules\Academic\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use JsonException;
use Spatie\Translatable\HasTranslations;

class Program extends Model
{
    use HasFactory;
    use HasTranslations;

    public $appends = ['image_link'];
    public $translatable = ['name'];
    protected $fillable = ['image', 'name', 'lang'];

    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(Level::class);
    }

    public function universities(): BelongsToMany
    {
        return $this->belongsToMany(University::class);
    }

    /**
     * @throws JsonException
     */
    public function getLangAttribute()
    {
        return json_decode($this->attributes['lang'], true, 512, JSON_THROW_ON_ERROR);
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

    public function scopeFilter($q)
    {

        if (request()->has('level')) {
            $q->whereHas('levels', function ($sub) {
                $levelId = request()->query('level');
                $sub->where('levels.id', $levelId);
            });
        }
    }
}
