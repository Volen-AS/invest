<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        $min_bet_act =  Own_token_by_emission::minbet();
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
        if(count($expireds)){
            foreach ($expireds as $expired) {
               ActLOtHistory::AddLotHistories($expired);
               Statistic::updataStatisticPlus($expired->seller_u_id,$expired->lider_price['bet_amount']);// seller
               Own_token_by_emission::updateToken($expired->seller_u_id,$expired->amount_token_lot,
                   $expired->start_price,$expired->emission_period); // take off selled token
               Own_token_by_emission::byNewToken($expired->previous_price_user,$expired->previous_price);// second position
               Own_token_by_emission::liderPosition($expired->lider_price_user,$expired->emission_period,
                    $expired->amount_token_lot,$expired->start_price,$expired->lider_price['aff_reward']);//first position
                $expired->delete();
            }
            return $date;
        }else{
            return $date;
        }
    }
}
