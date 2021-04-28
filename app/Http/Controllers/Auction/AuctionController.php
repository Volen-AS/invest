<?php

namespace App\Http\Controllers\Auction;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Token;
use App\Statistic;
use App\Referral;
use App\Purchased_tokens;
use App\Purchased_tokens_from_ref;
use App\Own_token_by_emission;
use Illuminate\Support\Str;
use Exception;

class AuctionController extends Controller
{

    protected function BuyNewToken(Request $request){

        $amount =  json_decode($request->amount);
        $u_id = Auth::id();

        $user_statistic = Statistic::where('u_id', $u_id)->first();
        $total_balance = $user_statistic->total_balance;
        $new_total_balance = $total_balance - $amount;
        if($new_total_balance < 0){
            return response()->json(['error'=>'Недостатньо коштів на рахунку']);
        }
        $token_rate_today = (float) Token::getRateTokenToday();
        $new_tokens = $amount / $token_rate_today;

        try {
            $affiliate = Referral::getAffilait($u_id);
        } catch (Exception $e) {
            $my_new_tokens = $new_tokens;
            $my_amount =$amount;
            $this->updateOwnToken($u_id,$new_tokens,$my_amount);

            $code = (string) Str::uuid();
            $chech_unique_transaction = Purchased_tokens::where('transaction', $code)->get();
            while (count($chech_unique_transaction)){
                $code = (string) Str::uuid();
                $chech_unique_transaction = Purchased_tokens::where('transaction', $code)->get();
            }
            $user_statistic->update([
                'total_balance'=>$new_total_balance
            ]);
            Purchased_tokens::create([
                'transaction'=>$code,
                'u_id'=> $u_id,
                'new_token'=>$my_new_tokens,
                'in_cash' =>$my_amount
            ]);
            return response()->json(['success'=>'Викупили нові токени'],200);
        }
        $AffiliateHasNorm = Own_token_by_emission::checkIfUserCanGetBonus($affiliate);
        if($AffiliateHasNorm === true){
            $my_new_tokens = number_format($new_tokens * 0.95,2);
            $my_amount = number_format($amount * 0.95,2);
            $affilliat_new_token = number_format($new_tokens * 0.05,2);
            $amount_affiliat = number_format($amount * 0.05,2);
            $this->updateOwnTokenAffiliat($affiliate,$affilliat_new_token,$amount_affiliat);
            $this->updateOwnToken($u_id,$my_new_tokens,$my_amount);
        }
        elseif($AffiliateHasNorm === false){
            $my_new_tokens = $new_tokens;
            $my_amount =$amount;
            $this->updateOwnToken($u_id,$new_tokens,$my_amount);
        }
        $code = (string) Str::uuid();
        $chech_unique_transaction = Purchased_tokens::where('transaction', $code)->get();
            while (count($chech_unique_transaction)){
                $code = (string) Str::uuid();
                $chech_unique_transaction = Purchased_tokens::where('transaction', $code)->get();
            }
        $user_statistic->update([
            'total_balance'=>$new_total_balance
        ]);
         Purchased_tokens::create([
            'transaction'=>$code,
            'u_id'=> $u_id,
            'new_token'=>$my_new_tokens,
            'in_cash' =>$my_amount
        ]);
        if($AffiliateHasNorm === true) {
            Purchased_tokens_from_ref::create([
                'transaction' => $code,
                'u_id' => $u_id,
                'u_id_to' => $affiliate,
                'new_token' => $affilliat_new_token,
                'in_cash' => $amount_affiliat
            ]);
        }
            return response()->json(['success'=>'Викупили нові токени'],200);
    }

    protected function updateOwnToken($u_id,$my_new_tokens,$my_amount){


        $date =  date('Y.m.01');
        $ownToken = Own_token_by_emission::where('date',$date)->where('u_id', $u_id)->first();
        if(!is_null($ownToken)) {
            $new_investment = $ownToken->investment + $my_amount;
            $new_own_token = $ownToken->own_token + $my_new_tokens;
            $ownToken->update(['investment' => $new_investment,
                                 'own_token' => $new_own_token
            ]);
        }
        else{
            Own_token_by_emission::create([
                'u_id' => $u_id,
                'date' => $date,
                'token_rate' => Token::getRateTokenToday(),
                'investment'=> $my_amount,
                'own_token'=>$my_new_tokens
            ]);
        }

    }

    protected function updateOwnTokenAffiliat($affiliate,$affilliat_token,$amount_affiliat){
        $date =  date('Y.m.01');
        $rate = Token::getRateTokenToday();
        $ownToken = Own_token_by_emission::where('date',$date)->where('u_id', $affiliate)->first();
        if(!is_Null($ownToken)){
            $new_investment = $ownToken->investment + $amount_affiliat;
            $new_own_token = $ownToken->own_token + $affilliat_token;
            $ownToken->update(['investment'=>$new_investment,
                                'own_token'=>$new_own_token]);
        }
        else{
            Own_token_by_emission::create([
                'u_id'=>$affiliate,
                'date'=>$date,
                'token_rate' => $rate,
                'investment'=> $amount_affiliat,
                'own_token'=>$affilliat_token
            ]);
        }
    }

}
