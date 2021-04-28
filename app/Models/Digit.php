<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Digit extends Model
{
    protected $fillable = ['u_id', 'balance', 'replenished', 'invested', 'payment'];
}
