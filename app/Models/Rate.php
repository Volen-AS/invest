<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rates';

    public $timestamps = false;

    protected $fillable = ['UAH', 'USD', 'LYD', 'RUB', 'CNY', 'INR', 'GBP', 'date'
		];

}
