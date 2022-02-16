<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'client_id',
        'accountcategory_id',
        'record_date',
        'record_amount',
        'record_receipt_no',
        'staff_id',
        'day',
        'month',
        'year'
    ];
}
