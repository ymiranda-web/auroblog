<?php

namespace App;

use App\Events\PostSaving;
use Illuminate\Database\Eloquent\Model;

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
}
