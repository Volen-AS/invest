<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Own_token_by_emission extends Model
{
    protected $table = 'own_token_by_emissions';

    protected $fillable = ['u_id', 'date', 'token_rate', 'investment', 'own_token'
    ];

    public static function checkIfUserCanGetBonus($u_id){
        $total_token = Own_token_by_emission::all()->sum('own_token');
        $user_owner_token = Own_token_by_emission::where('u_id',$u_id)->sum('own_token');
        $norm = $total_token*0.0001; //  0.01% of total token
        if($user_owner_token > $norm){
            return true;
        }
        else{
            return false;
        }
    }

    public static function totalToken(){
        $totalToken = Own_token_by_emission::sum('own_token');
        return $totalToken;
    }

    public static function totalInvest(){
        $totalToken = Own_token_by_emission::sum('investment');
        return $totalToken;
    }

    public static function myPercentOfToken($u_id){
        $my_total_token = Own_token_by_emission::where('u_id',$u_id)->sum('own_token');
        $all_token = Own_token_by_emission::sum('own_token');
        if($my_total_token == 0){
            $my_per_cent_of_token = 0;
            return $my_per_cent_of_token;
        }
        else{
            $my_per_cent_of_token = number_format(100*$my_total_token/$all_token,2);
            return $my_per_cent_of_token;
        }
    }
    public static function myTotalToken($u_id){
        $my_total_token = Own_token_by_emission::where('u_id',$u_id)->sum('own_token');
        return $my_total_token;
    }

    public static function minbet(){
        $total_amount = Own_token_by_emission::all()->sum('investment');
        $min_bet = floatval(number_format($total_amount*0.0001,2));
        return $min_bet;
    }

    public static function minLot(){
        $total_token = Own_token_by_emission::all()->sum('own_token');
        $min_lot = floatval(number_format($total_token*0.0001,2));
        return $min_lot;
    }
// add token from auction, second position in lot
    public static function byNewToken($u_id,$amount){

        $rate = Token::getRateTokenToday();
        $date = date('Y.m.01');
        $new_token = number_format($amount['bet_amount']/$rate,2);
        $affiliat = Referral::getAffilait($u_id);
        if($affiliat !== false){
            $check = Own_token_by_emission::checkIfUserCanGetBonus($affiliat);
            if($check  === true){
                self::addAuctionToken($u_id,$date,$new_token,$amount['bet_amount'],$rate);
                Statistic::updataBalancePlus($affiliat,$amount['aff_reward']);
                return;
            }else{
                self::addAuctionToken($u_id,$date,$new_token,$amount['bet_amount'],$rate);
                Statistic::updataBalancePlus($u_id,$amount['aff_reward']);
                return;
            }
        }
        else{
            self::addAuctionToken($u_id,$date,$new_token,$amount['bet_amount'],$rate);
            Statistic::updataBalancePlus($u_id,$amount['aff_reward']);
            return;
        }

    }
    public static function addAuctionToken($u_id,$emission_period,$token,$price,$rate){

        $ownToken = Own_token_by_emission::where('date',$emission_period)->where('u_id', $u_id)->first();
        if(!is_Null($ownToken)){
            $new_investment = $ownToken->investment + $price;
            $new_own_token = $ownToken->own_token + $token;
            $ownToken->update(['investment'=>$new_investment,
                'own_token'=>$new_own_token]);
        }
        else{
            Own_token_by_emission::create([
                'u_id'=>$u_id,
                'date'=>$emission_period,
                'token_rate' => $rate,
                'investment'=> $price,
                'own_token'=>$token
            ]);
        }
    }

    public static function liderPosition($u_id,$emission_period,$token,$price,$aff_reward){
        $rate = Token::where('date',$emission_period)->first()->token_price;
        self::addAuctionToken($u_id,$emission_period,$token,$price,$rate);
        $affiliat = Referral::getAffilait($u_id);
        if($affiliat !== false){
            $check = Own_token_by_emission::checkIfUserCanGetBonus($affiliat);
            if($check === true){
                Statistic::updataBalancePlus($affiliat,$aff_reward);
            }else{
                Statistic::updataBalancePlus($u_id,$aff_reward);
            }
        }else{
           Statistic::updataBalancePlus($u_id,$aff_reward);
        }

    }
    public static function updateToken($u_id,$token,$price,$emission_period){

        $ownToken = Own_token_by_emission::where('date',$emission_period)->where('u_id', $u_id)->first();
        $ownToken->investment = $ownToken->investment - $price;
        $ownToken->own_token = $ownToken->own_token - $token;
        $ownToken->save();
    }
}
