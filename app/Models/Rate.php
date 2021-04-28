<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rate
 *
 * @property int $id
 * @property string|null $UAH
 * @property string|null $USD
 * @property string|null $LYD
 * @property string|null $RUB
 * @property string|null $CNY
 * @property string|null $INR
 * @property string|null $GBP
 * @property string|null $date
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereCNY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereGBP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereINR($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereLYD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereRUB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereUAH($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rate whereUSD($value)
 * @mixin \Eloquent
 */
class Rate extends Model
{
    protected $table = 'rates';

    public $timestamps = false;

    protected $fillable = ['UAH', 'USD', 'LYD', 'RUB', 'CNY', 'INR', 'GBP', 'date'
		];

}
