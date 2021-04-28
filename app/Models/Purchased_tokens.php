<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchased_tokens extends Model
{

    protected $table = 'purchased_tokens';


    protected $fillable = ['transaction', 'u_id', 'rate', 'new_token','in_cash'
    ];

}
