<?php

namespace App\Http\Controllers\Auction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actiov_lot;
use App\Models\Statistic;
use Auth;

class ActiveLotBetController extends Controller
{
    public function betOnActAuction(Request $request){

        $amount = json_decode($request->sum);
        $transaction = json_decode($request->transaction);
        $u_id = Auth::id();
        $lot_a = Actiov_lot::where('code_transaction_au',$transaction)->first();
        $checkIfUserOwner = $this->checkIfUserOwner($lot_a->seller_u_id, $u_id);
        if($checkIfUserOwner === true){
            return response()->json(['error' => 'Ви не можете купити свій лот']);
        }
        $checkIfUserHasLastBet = $this->checkIfUserHasLastBet($lot_a->lider_price_user, $u_id);
        if($checkIfUserHasLastBet === true){
            return response()->json(['error' => 'Ваша ставка є лідируюча в цьому лоті']);
        }
        $statistic = Statistic::where('u_id',$u_id)->first();
        if($statistic->total_balance < $amount){
            return response()->json(['error' => 'Недостатня сума на Вашому рахунку. Поповніть рахунок або виберіть інший лот']);
        }

        $bet_act_lot['bet_amount'] = number_format($amount*0.95,2);
        $bet_act_lot['aff_reward'] = number_format($amount*0.05,2);

        $previous['user'] = $lot_a->previous_price_user;
        $previous['price'] = $lot_a->previous_price['bet_amount'] + $lot_a->previous_price['aff_reward'];

        $lider['user'] = $lot_a->lider_price_user;
        $lider['price'] = $lot_a->lider_price;
            $lot_a->update([
                'previous_price'=>$lider['price'],
                'previous_price_user'=>$lider['user'],
                'lider_price'=>$bet_act_lot,
                'lider_price_user'=>$u_id
            ]);

        $statistic->total_balance = $statistic->total_balance - $amount;
        $statistic->save();

        $statistic_previous = Statistic::where('u_id', $previous['user'])->first();

        $new_statistic_previous_balance = $statistic_previous->total_balance + $previous['price'] ;
        $statistic_previous->total_balance = $new_statistic_previous_balance;
        $statistic_previous->save();

            return response()->json(['msg_lot' => 'Ви встановили нову лідируючу ставку']);
    }

    protected function checkIfUserOwner($lot_id,$u_id){
        if($lot_id == $u_id){
            return true;
        }else {
            return false;
        }
    }

    protected function checkIfUserHasLastBet($lot_id,$u_id){
        if($lot_id == $u_id){
            return true;
        }else {
            return false;
        }
    }
}
