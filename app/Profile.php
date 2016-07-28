<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";

    protected $fillable = [
        'id_user', 'id_occupation', 'street', 'number', 'genre', 'telephone', 'cellphone', 'cape', 'image', 'about', 'created_at', 'updated_at',
    ];
}
