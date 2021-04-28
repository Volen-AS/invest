<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat_list_user extends Model
{
    protected $table = 'chat_list_users';

    protected $fillable = ['chat_id', 'u_id'
		];
}
