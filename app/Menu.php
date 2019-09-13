<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    protected $fillable = [
        'name', 'slug', 'title', 'description', 'parent_id', 'user_id', 'status',
    ];

    public function childs () {
    	return $this->hasMany(Menu::class, 'parent_id');
    }

	public function childs_active () {
    	return $this->hasMany(Menu::class, 'parent_id')->where('status',1);
    }    
    
    public function parent () {
    	return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function posts () {
        return $this->hasMany(Post::class);
    }

}
