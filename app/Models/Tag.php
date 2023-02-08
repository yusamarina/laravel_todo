<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ScopeTag;
use Illuminate\Support\Facades\Auth;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static $rules = array(
        'name' => 'max:30'
    );

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopeTag);

        self::saving(function ($tag) {
            $tag->user_id = Auth::id();
        });
    }

    public function articles()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    public function scopeNameEqual($query, $str)
    {
        return $query->where('name', $str);
    }
}
