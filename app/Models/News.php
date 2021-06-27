<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $imagePath = "/img/news/";

    protected $fillable = [
        'title',
        'content',
        'publish_at',
        'user_id',
    ];

    public function image()
    {
        return $this->imagePath . $this->id . ".jpg";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
