<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopeTask;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [
        'user_id',
        'title',
        'memo',
        'status',
        'deadline',
    ];

    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required|max:50'
    );

    public function getData()
    {
        return 'user:' . $this->user_id . '【status:' . $this->status . '】' . '   ' . $this->title . ' (' . $this->memo . ') ';
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopeTask);

        self::saving(function ($task) {
            $task->user_id = Auth::id();
        });
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag')->withTimestamps();
    }

    public function scopeTitleEqual($query, $str)
    {
        return $query->where('title', $str);
    }
}
