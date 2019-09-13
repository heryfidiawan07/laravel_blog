<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'status', 'token', 'img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin(){
        if ($this->role > 0) {
            return true;
        }
        return false;
    }

    public function menus () {
        return $this->hasMany(Menu::class);
    }

    public function pages () {
        return $this->hasMany(Page::class);
    }

    public function posts () {
        return $this->hasMany(Post::class);
    }

    public function categories () {
        return $this->hasMany(Category::class);
    }

    public function tags () {
        return $this->hasMany(Tag::class);
    }

    public function comments () {
        return $this->hasMany(Comment::class);
    }

    public function application(){
    	return $this->hasOne(Application::class);
    }

    public function banners () {
        return $this->hasMany(Banner::class);
    }

}
