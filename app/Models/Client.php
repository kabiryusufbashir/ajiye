<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'client_business_name',
        'client_email',
        'client_username',
        'client_phone_number',
        'client_photo',
        'client_address',
        'password',
    ];

    public function getRouteKeyName()
    {
        return 'client_username'; //this will return user name as route 
    }
}
