<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
	protected $table = 'profiles';

	protected $fillable = ['user_id', 'first_name', 'last_name', 'second_name', 'phone_number', 'reserve_phone_number', 'reserve_mail', 'skype'
		];

	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

