<?php

namespace Modules\Academic\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations;

class University extends Model
{
    use HasFactory;

    use HasTranslations;

    public array $translatable = ['title', 'description', 'content', 'keywords'];
    protected $appends = ['image_link', 'logo_link', 'disc_price'];
    protected $fillable = ['title', 'slug', 'description', 'content', 'image', 'logo', 'video', 'location',
        'price', 'discount', 'rank', 'type', 'publish', 'keywords', 'featured', 'visits'];
    protected $with = ['programs'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($q) {
            $q->created_by = Auth::id();
        });
    }

    public function scopeFeatured($q)
    {
        $q->where('publish', 'published')->where('featured', 1);
    }

    public function scopeType($q, $type)
    {
        $q->where('type', $type);
    }


    public function scopePublished($q)
    {
        $q->where('publish', 'published');
    }

    public function scopeCardData($q)
    {
        $q->select('id', 'slug', 'title', 'logo', 'location', 'price', 'image', 'visits', 'created_at', 'publish', 'featured');
    }

    public function getImageLinkAttribute()
    {
        if (!empty($this->attributes['image'])) {
            return asset('storage/' . $this->attributes['image']);
        }

        return null;
    }

    public function getDiscPriceAttribute()
    {
        if (!empty($this->attributes['price']) && !empty($this->attributes['discount'])) {
            return number_format(round($this->attributes['price'] * (1 - $this->attributes['discount'] / 100), 2));
        }

        return null;
    }


    // Assuming you have a similar accessor for logo_link
    public function getLogoLinkAttribute()
    {
        if (!empty($this->attributes['logo'])) {
            return asset('storage/' . $this->attributes['logo']);
        }

        return null;
    }


    public function scopeFilter($q)
    {
        if (request()->has('q')) {
            $query = request()->query('q');
            $q->whereAny([
                'title',
                'description',
                'keywords',
            ], 'LIKE', "%$query%");
        }

        if (request()->has('program')) {
            $q->whereHas('programs', function ($sub) {
                $programId = request()->query('program');
                $sub->where('programs.id', $programId);
            });
        }
    }

    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(Program::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
