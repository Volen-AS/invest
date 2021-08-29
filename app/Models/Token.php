<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Token
 *
 * @property int $id
 * @property string $token_price
 * @property string $date
 * @method static \Illuminate\Database\Eloquent\Builder|Token newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Token query()
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Token whereTokenPrice($value)
 * @mixin \Eloquent
 */
class Token extends Model
{
    protected $table = 'tokens';

    protected $fillable = [
        'token_price',
        'date',
    ];

    public $timestamps = false;

    public static function getRateTokenToday()
    {
        $tokenRate = Token::whereDate('date', date('Y.m.01'))->first();

        return $tokenRate->token_price ?? 0;
    }

    public static function tokenByMounth()
    {
        $date = Token::orderBy('date', 'ASC')->first();
        $start_time = new Carbon($date->date);
        $present_time = Carbon::today();
        $diff = $present_time->diffInMonths($start_time);

        $each_mounths = [];

        for ($i = 1; $i <= $diff + 1; $i++) {
            $present['sum_token'] = Own_token_by_emission::where('date', $start_time->format('Y-m-d'))->sum('own_token');

            $present['sum_invest'] = Own_token_by_emission::where('date', $start_time->format('Y-m-d'))->sum('investment');
            $present['rate'] = Token::where('date', $start_time->format('Y-m-d'))->first()->token_price;
            $present['date'] = $start_time->format('Y-m-d');
            $each_mounths[] = $present;
            $start_time = $start_time->addMonths();
        }
        return $each_mounths;
    }

    public static function getTokenEmissionDividends()
    {
        $tokens_tables = DB::table('tokens')
            ->join('monthly_rates', 'monthly_rates.date', '=', 'tokens.date')
            ->select('tokens.token_price', 'tokens.date', 'monthly_rates.monthly_rate')
            ->get();

        return $tokens_tables;
    }
}
