<?php

namespace App;

use App\Events\PostSaving;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content_md',
    ];

    protected $dispatchesEvents = [
        'saving' => PostSaving::class,
    ];

    public function getSummaryAttribute()
    {
        return Str::of(strip_tags($this->content))->limit(300);
    }
}
