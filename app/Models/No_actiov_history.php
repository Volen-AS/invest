<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class No_actiov_history extends Model
{
    protected $table = 'no_actiov_histories';

    protected $fillable = ['code_transaction_au', 'emission_period','amount_token_lot','seller_u_id',
                            'start_price','first_buyer','first_price_lot','created_at'
    ];

    protected $casts = [
        'first_price_lot' => 'array',
    ];

    public static function PassLolHistory($expired){
        No_actiov_history::create([
            'code_transaction_au'=>$expired->code_transaction_au,
            'emission_period'=>$expired->emission_period,
            'amount_token_lot'=>$expired->amount_token_lot,
            'seller_u_id'=>$expired->seller_u_id,
            'start_price'=>$expired->start_price,
            'first_buyer'=>$expired->first_buyer,
            'first_price_lot'=>$expired->first_price_lot
        ]);
    }
    public static function getPassLolHistory($u_id){
        $historiesNotActLots = No_actiov_history::where('seller_u_id', $u_id)
            ->orWhere('first_buyer',$u_id)
            ->get();
        return $historiesNotActLots;
    }
    public static function getAllLotHistories(){
        $historiesPassLots = No_actiov_history::all();
            return $historiesPassLots;
    }

    public static function getPassLolHistoryTeam($team){
        $historiesNotActLotTeams = No_actiov_history::whereIn('seller_u_id', $team)
            ->orWhereIn('first_buyer',$team)
            ->get();
        return $historiesNotActLotTeams;
    }
}
