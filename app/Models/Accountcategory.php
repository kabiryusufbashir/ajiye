<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'account_category_name',
    ];
}
