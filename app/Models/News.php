<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $

    protected $fillable = [
        'title',
        'content',
        'publish_at',
        'user_id',
    ];

    public function image()
    {
        return 
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
