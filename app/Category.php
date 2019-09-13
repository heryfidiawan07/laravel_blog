<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
		'name', 'slug', 'title', 'description', 'menu_type', 'user_id',
	];

    public function posts () {
        return $this->belongsToMany(Post::class);
    }

    public function user () {
    	return $this->belongsTo(User::class);
    }

}
