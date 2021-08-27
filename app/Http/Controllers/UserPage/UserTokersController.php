<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Controller;
use App\Models\Actiov_lot;
use App\Models\Chat_list_messegde;
use App\Models\No_actiov_lot;
use App\Models\Own_token_by_emission;
use App\Models\Ticker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserTokersController extends Controller
{
    public function ownTokens(){
        $u_id = Auth::id();
        $sum_invest = Own_token_by_emission::where('u_id',$u_id)->sum('investment');
        $sum_token = Own_token_by_emission::where('u_id',$u_id)->sum('own_token');

        $table_own_tokens = Own_token_by_emission::where('u_id',$u_id)->get();
        foreach ($table_own_tokens as $table_own_token){
            $token_rate = $table_own_token->date;
            $toke_in_auction_actin =  Actiov_lot::where(['seller_u_id'=>$u_id,'emission_period'=>$token_rate])->sum('amount_token_lot');
            $toke_in_auction_Noactin = No_actiov_lot::where(['seller_u_id'=>$u_id,'emission_period'=>$token_rate])->sum('amount_token_lot');
            $total_token_in_auction = $toke_in_auction_Noactin + $toke_in_auction_actin;
            $table_own_token = Arr::add($table_own_token,'total_token_in_auction',$total_token_in_auction);

        }
        return view('user.tokens.ownTokens')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
            'table_own_tokens' => $table_own_tokens,
            'sum_invest'=> $sum_invest,
            'sum_token'=>$sum_token,
            'min_lot'=>Own_token_by_emission::minLot()
        ]);
    }
}
