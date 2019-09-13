<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    
    protected $fillable = [
        'img', 'main', 'user_id',
    ];

    public function user () {
        return $this->belongsTO(User::class);
    }

    public function post () {
        return $this->belongsTo(Post::class);
    }

}
