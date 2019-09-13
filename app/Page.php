<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    
    protected $fillable = [
    	'name', 'title', 'slug', 'body', 'form', 'user_id',
    ];

    public function user () {
    	return $this->belongsTo(User::class);
    }

}
