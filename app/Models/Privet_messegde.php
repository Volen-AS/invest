<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privet_messegde extends Model
{
    protected $table = 'privet_messegdes';

    protected $fillable = ['message_id', 'chat_id', 'u_id', 'to_uid', 'message', 'created_at',
    ];
    protected $primaryKey = 'message_id';
}
