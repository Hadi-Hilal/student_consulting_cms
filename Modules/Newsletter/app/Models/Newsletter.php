<?php

namespace Modules\Newsletter\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to', 'lang', 'status', 'subject', 'message', 'count_receivers', 'created_by'];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->created_by = Auth::id();
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
