<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    protected $fillable = [
		'name', 'slug', 'title', 'description', 'menu_type', 'user_id',
	];

    public function user () {
        return $this->belongsTo(User::class);
    }
    
    public function posts () {
        return $this->morphedByMany(Post::class, 'taggable');
    }

}
