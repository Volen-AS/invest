<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurEvent extends Model
{
	protected $table = 'our_events';

    protected $fillable = [
        'title', 'text', 'our_event_pic', 'created_at'
    ];
}
