<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = [
        'body', 'parent_id', 'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function commentable () {
        return $this->morphTo();
    }

    public function parent () {
    	return $this->belongsTo(Comment::class, 'parent_id');
    }
    
    public function childs () {
    	return $this->hasMany(Comment::class, 'parent_id');
    }

}
