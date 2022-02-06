<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

use App\Models\Client;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'staff_username',
        'staff_email',
        'password',
        'staff_name',
        'staff_type'
    ];

    public function client(){
        return $this->belongsTo(Client::class, 'foreign_key', 'owner_key');
    }

}
