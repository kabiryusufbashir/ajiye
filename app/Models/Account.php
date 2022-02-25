<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'account_name',
    ];

    public function record(){
        return $this->hasMany(Record::class);
    }

    public function accountcategory(){
        return $this->hasMany(Accountcategory::class);
    }
}
