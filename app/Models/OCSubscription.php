<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OCSubscription extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }
}
