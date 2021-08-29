<?php

namespace App\Http\Controllers\Auction;

use App\Models\Own_token_by_emission;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\Token;
use App\Models\No_actiov_lot;
use App\Models\Actiov_lot;
use App\Models\Statistic;

class LotAuctionController extends Controller
{
    protected function CreateLot(Request $request){
        $emission_period = $request->token_emission;
        $new_lot_amount = json_decode($request->new_lot_amount);

        $u_id = Auth::id();
        $full_date = '01-'.$emission_period;
        $date_emission_period = date('Y-m-d', strtotime($full_date));
        $get_rate_emission_period = Token::where('date',$date_emission_period)->first()->token_price;
        $start_price = $new_lot_amount * $get_rate_emission_period;
        $code_transaction = mt_rand(1000000000000000, 9999999999999999);

        No_actiov_lot::create([
            'code_transaction_au'=>$code_transaction,
            'emission_period'=>$date_emission_period,
            'amount_token_lot'=>$new_lot_amount,
            'seller_u_id'=>$u_id,
            'start_price'=>$start_price,
        ]);
       return response()->json(['code_transaction'=>$code_transaction,
                                'start_p'=>$start_price,
                                'token'=>$new_lot_amount
                                ]);
    }

    public function betOnPassAuction(Request $request)
    {
        $transaction = json_decode($request->transaction_number);
        $inputAmount = json_decode($request->inputAmount);
        $u_id = Auth::id();
        if(is_null($inputAmount)){
            return response()->json(['error' => 'Ставку не зроблено']);
        }
        $lot_p = No_actiov_lot::where('code_transaction_au',$transaction)->first();
        $checkIfUserOwner = $this->checkIfUserOwner($lot_p->seller_u_id, $u_id);
        if($checkIfUserOwner === true){
            return response()->json(['error' => 'Ви не можете купити свій лот']);
        }
        $checkIfUserHasLastBet = $this->checkIfUserFirstBet($lot_p->first_buyer, $u_id);
        if($checkIfUserHasLastBet === true){
            return response()->json(['error' => 'Ваша ставка є лідируюча в цьому лоті']);
        }
        $statistic = Statistic::where('u_id',$u_id)->first();
        if($statistic->total_balance < $inputAmount){
            return response()->json(['error' => 'Недостатня сума на Вашому рахунку. Поповніть рахунок або виберіть інший лот']);
        }

        $bet_data['bet_amount'] = floatval(number_format($inputAmount*0.95,2));
        $bet_data['aff_reward'] = $inputAmount -  $bet_data['bet_amount'];

        if(is_null($lot_p->first_buyer)){
            $this->updateTotalBalance($statistic,$inputAmount);
            $lot_p->update([
                'first_buyer'=>$u_id,
                'first_price_lot'=>$bet_data
            ]);
            return response()->json(['first_bet' => 'Ви зробили першу ставку на лот. Лот очікує другу ставку.',
                                     'transaction'=>$transaction,'new_lot_bit'=>$bet_data['bet_amount'], 'first_buyer'=> $u_id]);
        }

        else {
            $this->updateTotalBalance($statistic,$inputAmount);
            $creat_lot = $lot_p->created_at;
            $timeNow = Carbon::now();
            $interval = date_diff($timeNow,$creat_lot)->format('%d %h:%i:%s');

            $moveLot = Actiov_lot::create([
                'code_transaction_au' => $transaction,
                'emission_period' => $lot_p->emission_period,
                'amount_token_lot' => $lot_p->amount_token_lot,
                'seller_u_id' => $lot_p->seller_u_id,
                'start_lot_time'=>$interval,
                'start_price' => $lot_p->start_price,
                'previous_price' => $lot_p->first_price_lot,
                'previous_price_user' => $lot_p->first_buyer,
                'lider_price' => $bet_data,
                'lider_price_user' => $u_id
                ]);
            $final_date_act = $moveLot->created_at->addDays(3);
            $result_time = $final_date_act->format('Y-m-d H:i:s');
            $min_bet = Own_token_by_emission::minBet();
            $rate_of_token = Token::where('date',$moveLot->emission_period )->first()->token_price;
            $lot_p->delete();
            return response()->json(['new' => 'Лот акативовано. Протягом наступних 72 годин триватимуть торги',
                                     'moveLot'=> $moveLot,
                                     'min_bet'=>$min_bet,
                                     'final_date_act'=>$result_time,
                                      'rate_of_token'=>$rate_of_token
            ]);
        }
    }
    protected function updateTotalBalance($statistic,$inputAmount){

        $newBalance = $statistic->total_balance  - $inputAmount;
        $statistic->update([
            'total_balance'=>$newBalance
        ]);
    }
    protected function checkIfUserOwner($lot_id,$u_id){
        if($lot_id == $u_id){
            return true;
        }else {
            return false;
        }
    }
    protected function checkIfUserFirstBet($lot_id,$u_id){
        if($lot_id == $u_id){
            return true;
        }else {
            return false;
        }
    }
}
