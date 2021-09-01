<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * App\Models\Actiov_lot
 *
 * @property int $id
 * @property string $code_transaction_au
 * @property string $emission_period
 * @property string $amount_token_lot
 * @property int $seller_u_id
 * @property string $start_lot_time
 * @property string $start_price
 * @property array $previous_price
 * @property int $previous_price_user
 * @property array $lider_price
 * @property int $lider_price_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereAmountTokenLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereCodeTransactionAu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereEmissionPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereLiderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereLiderPriceUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot wherePreviousPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot wherePreviousPriceUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereSellerUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereStartLotTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereStartPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actiov_lot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Actiov_lot extends Model
{
    protected $table = 'actiov_lots';

    protected $fillable = ['code_transaction_au', 'emission_period','amount_token_lot','seller_u_id','start_lot_time',
        'start_price','previous_price','previous_price_user','lider_price','lider_price_user'
    ];

    protected $casts = [
        'previous_price' => 'array',
        'lider_price' => 'array'
    ];

    public static function activeLot(){
        $date = Carbon::now()->subDay(3);
        self::checkTimelots($date);

        $actiov_lots = Actiov_lot::where('created_at','>',$date)->get();
        $min_bet_act =  Own_token_by_emission::minBet();
        foreach($actiov_lots as $actiov_lot){
           $toker_rate_act = Token::where('date',$actiov_lot->emission_period)->first()->token_price;
            $final_date_act = $actiov_lot->created_at->addDays(3);
            $actiov_lot['final_date_act'] = $final_date_act;
            $actiov_lot['toker_rate_act'] = $toker_rate_act;
            $actiov_lot['min_bet_act'] = $min_bet_act;
        }
        return $actiov_lots;
    }
    private static function checkTimelots($date){
        $expireds = Actiov_lot::where('created_at','<=',$date)->get();

        foreach ($expireds as $expired) {
           self::addLotHistories($expired);
           Statistic::updataStatisticPlus($expired->seller_u_id,$expired->lider_price['bet_amount']);// seller
           Own_token_by_emission::updateToken($expired->seller_u_id,$expired->amount_token_lot,
               $expired->start_price,$expired->emission_period); // take off selled token
           Own_token_by_emission::byNewToken($expired->previous_price_user,$expired->previous_price);// second position
           Own_token_by_emission::liderPosition($expired->lider_price_user,$expired->emission_period,
                $expired->amount_token_lot,$expired->start_price,$expired->lider_price['aff_reward']);//first position
            $expired->delete();
        }
        return $date;

    }

    private static function addLotHistories($lot): void
    {
        $history = new ActLOtHistory();
        $history->code_transaction_au = $lot->code_transaction_au;
        $history->emission_period = $lot->emission_period;
        $history->amount_token_lot = $lot->amount_token_lot;
        $history->seller_u_id = $lot->seller_u_id;
        $history->start_price = $lot->start_price;
        $history->previous_price = $lot->previous_price;
        $history->previous_price_user = $lot->previous_price_user;
        $history->lider_price = $lot->lider_price;
        $history->lider_price_user = $lot->lider_price_user;
        $history->save();
    }
}
