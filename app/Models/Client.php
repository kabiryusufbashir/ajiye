<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_business_name',
        'client_email',
        'client_username',
        'client_phone_number',
        'client_photo',
        'client_address',
        'client_password',
    ];
}
