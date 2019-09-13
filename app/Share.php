<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    
    protected $table = 'share';

    protected $fillable = [
        'provider_class', 'url', 'user_id',
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }

    public function providers () {
        return [
            'fab fa-facebook' => 'https://www.facebook.com/sharer.php?u=`url`',
            'fab fa-twitter' => 'https://twitter.com/share?url=[`url`]&text=[`title`]',
            'fab fa-whatsapp' => 'whatsapp://send?text=`url`',
            'fab fa-google' => 'https://plus.google.com/share?url=[`url`]',
            'fas fa-envelope' => 'mailto:?subject=[`title`]&body=Check out this site:[`url`]',
            'fab fa-pinterest' => 'https://pinterest.com/pin/create/bookmarklet/?media=[`img`]&url=[`url`]&description=[`title`]',
        ];
    }

}
