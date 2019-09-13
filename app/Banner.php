<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    
    protected $fillable = ['img'];

    public function user(){
    	return $this->belongsTo(User::class);
    }

}
