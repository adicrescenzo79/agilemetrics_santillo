<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VipToken extends Model
{
    protected $fillable = [
        'token',
        'role',
    ];
}
