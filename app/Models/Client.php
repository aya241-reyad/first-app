<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens,HasFactory;

    protected $fillable=[
        'name',
        'address',
        'phone',
        'email',
        'password'
    ];


    protected $hidden = [
        'password',
    ];

}
