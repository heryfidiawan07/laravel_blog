<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = [
        'title', 'slug', 'summary', 'body', 'status', 'sticky', 'comment', 'user_id', 'menu_id', 'counter',
    ];

    public function menu () {
    	return $this->belongsTo(Menu::class);
    }
    
    public function user () {
        return $this->belongsTo(User::class);
    }

    public function pictures () {
        return $this->hasMany(Picture::class);
    }

    public function categories () {
        return $this->belongsToMany(Category::class);
    }
    
    public function tags () {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments () {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
