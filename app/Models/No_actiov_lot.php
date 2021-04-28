<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\No_actiov_lot
 *
 * @property int $id
 * @property string|null $code_transaction_au
 * @property string|null $emission_period
 * @property string|null $amount_token_lot
 * @property int|null $seller_u_id
 * @property string|null $start_price
 * @property int|null $first_buyer
 * @property array|null $first_price_lot
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot query()
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereAmountTokenLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereCodeTransactionAu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereEmissionPeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereFirstBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereFirstPriceLot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereSellerUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereStartPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|No_actiov_lot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class No_actiov_lot extends Model
{
    protected $table = 'no_actiov_lots';

    protected $fillable = ['code_transaction_au', 'emission_period','amount_token_lot','seller_u_id','start_price','first_buyer','first_price_lot'
    ];

    protected $casts = [
        'first_price_lot' => 'array',
    ];

    public static function notActiveLot(){

          $date = Carbon::now()->subDay(3);
          self::checkTimePasslots($date);
        $not_actiov_lots = No_actiov_lot::where('created_at','>',$date)->get();
        $min_bet = Own_token_by_emission::minbet();
        foreach ($not_actiov_lots as $not_actiov_lot){
            $final_date = $not_actiov_lot->created_at->addDays(3);
            $token_em_price = Token::where('date',$not_actiov_lot->emission_period)->first()->token_price;
            $not_actiov_lot['token_em_price'] = $token_em_price;
            $not_actiov_lot['final_date'] = $final_date;
            $not_actiov_lot['min_bet'] = $min_bet;
        }
        return $not_actiov_lots;
    }
     protected static function checkTimePasslots($date){
         $expireds = No_actiov_lot::where('created_at','<=',$date)->get();
         if(count($expireds)){
             foreach($expireds as $expired){
                 No_actiov_history::PassLolHistory($expired);
                 if($expired->first_buyer === null){
                     $expired->delete();
                 }else{
                    $full_bet = $expired->first_price_lot['bet_amount'] + $expired->first_price_lot['aff_reward'];
                    Statistic::updataBalancePlus($expired->first_buyer,$full_bet);
                    $expired->delete();
                 }
             }
             return $date;
         }else{
             return $date;
         }
    }
}
