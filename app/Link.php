<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $attributes = [
        'user_id' => null,
        'disabled' => 0
    ];
    protected $dateFormat = 'U';
    protected $fillable = ['slug', 'link'];
}
