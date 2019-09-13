<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    
    protected $fillable = [
        'img', 'app_name', 'title', 'description', 'author', 'company', 'email', 'phone', 'fax', 'address', 'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

}
