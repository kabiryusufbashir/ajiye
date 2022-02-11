<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imprest extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'imprest_amount'
    ];
}
