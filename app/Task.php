<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['title', 'category', 'priority', 'user_id', 'completed', 'expiration'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
