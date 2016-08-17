<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = [
        'id_profile',
        'id_post',
        'like',
        'unlike'
    ];
}
