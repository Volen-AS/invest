<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Purchased_tokens_from_ref extends Model
{

    protected $table = 'purchased_tokens_from_refs';


    protected $fillable = ['u_id', 'u_id_to','transaction','new_token','rate', 'in_cash'
    ];

}
