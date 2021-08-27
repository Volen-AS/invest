<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Monthly_rate
 *
 * @property int $id
 * @property string $monthly_rate
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly_rate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly_rate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly_rate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly_rate whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly_rate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monthly_rate whereMonthlyRate($value)
 * @mixin \Eloquent
 */
class Monthly_rate extends Model
{
    protected $table = 'monthly_rates';

    protected $fillable = ['id','date', 'monthly_rate'];

    public $timestamps = false;
}

