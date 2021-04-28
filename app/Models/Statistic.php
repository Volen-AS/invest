<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Statistic
 *
 * @property int $id
 * @property int $u_id
 * @property string $total_balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereTotalBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Statistic whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Statistic extends Model
{
	protected $table = 'statistics';

    protected $fillable = [
        'u_id', 'total_balance'
    ];

    public static function fundsInvolved($u_id){
        $nAct = No_actiov_lot::where('first_buyer',$u_id)->get();
        $sum_auction_st = 0;
        foreach ($nAct as $lot) {
            $sum_auction_st = $sum_auction_st + $lot->first_price_lot['bet_amount'];
        }
        $previous_lots  = Actiov_lot::where('previous_price_user',$u_id)->get();
        foreach ($previous_lots as $previous_lot) {
            $sum_auction_st = $sum_auction_st + $previous_lot->previous_price['bet_amount'];
        }
        $liders  = Actiov_lot::where('lider_price_user',$u_id)->get();
        foreach ($liders as $lider) {
            $sum_auction_st = $sum_auction_st + $lider->lider_price['bet_amount'];
        }
            return $sum_auction_st;
    }

    public static function tokenInAuction($u_id){
        $nAct = No_actiov_lot::where('seller_u_id',$u_id)->sum('amount_token_lot');
        $act  = Actiov_lot::where('seller_u_id',$u_id)->sum('amount_token_lot');
        $tokenInAuction = $nAct+$act;
        return $tokenInAuction;
    }

    public static function referralReward($u_id){
        $referralReward = Purchased_tokens_from_ref::where('u_id_to',$u_id)->sum('in_cash');
            return $referralReward;
    }

    public static function updataStatisticPlus($u_id,$sum){

        $affiliat = Referral::getAffilait($u_id);
        if($affiliat !== false){
            $check = Own_token_by_emission::checkIfUserCanGetBonus($affiliat);
            if($check === true){
                $my_bal = (float) number_format($sum * 0.95,2);
                $affiliat_bal =(float) number_format($sum * 0.05,2);
                self::updataBalancePlus($u_id,$my_bal);
                self::updataBalancePlus($affiliat,$affiliat_bal);
                return true;
            }else{
                self::updataBalancePlus($u_id,$sum);
                return true;
            }
        }else{
            self::updataBalancePlus($u_id,$sum);
            return true;
        }
    }
    public static function updataBalancePlus($u_id,$sum){

        $cur_data = Statistic::where('u_id',$u_id)->first();
        $new_balance = $cur_data->total_balance + $sum;
        $cur_data->total_balance = $new_balance;
        $cur_data->save();
    }
}
