<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    
    protected $table = 'follow';

    protected $fillable = [
        'provider_class', 'url', 'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function providers () {
        return [
            'fab fa-instagram',
            'fab fa-facebook',
            'fab fa-twitter',
            'fab fa-youtube',
            'fab fa-github',
            'fab fa-linkedin-in',
            'fab fa-whatsapp',
            'fas fa-phone',
            'fas fa-globe',
        ];
    }

}
