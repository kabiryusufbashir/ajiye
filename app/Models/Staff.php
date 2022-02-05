<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'staff_username',
        'password',
        'staff_name',
        'staff_type'
    ];
}
