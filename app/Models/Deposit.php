<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    //
    protected $fillable = ['received_from', 'amount', 'remarks', 'created_at'];
}
