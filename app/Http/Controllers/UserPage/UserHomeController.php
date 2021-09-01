<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Controller;
use App\Models\Ticker;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Statistic;
use App\Models\Referral;
use App\Models\Profile;
use App\Models\Chat_list_messegde;
use App\Models\Chat_id;
use App\Models\Token;
use App\Models\Own_token_by_emission;
use App\Models\Actiov_lot;
use App\Models\No_actiov_lot;
use App\Models\Purchased_tokens_from_ref;
use App\Models\Purchased_tokens;
use App\Models\ActLOtHistory;
use App\Models\No_actiov_history;
use Illuminate\Http\Request;


class UserHomeController extends Controller
{

    public function index(Request $request)
    {
		$u_id = Auth::id();
		$my_chats = Chat_id::getMyChates($u_id);
        setcookie('my_chat',$my_chats['my_chat']);
        setcookie('aff_chat',$my_chats['aff_chat']);
        setcookie('ID', $u_id);
		return view('user.cabinet')
            ->with([
            	'ourEvents' => null,
            	'news' =>null,
            	'rateTokenToday'=> Token::getRateTokenToday(),
            	'statistics' => Statistic::where('u_id', $u_id)->first(),
                'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
                'getRateTokenToday' => Token::getRateTokenToday(),
                'table_own_tokens' => Own_token_by_emission::where('u_id',$u_id)->get(),
                'sum_invest'=> Own_token_by_emission::where('u_id',$u_id)->sum('investment'),
                'sum_token'=>Own_token_by_emission::where('u_id',$u_id)->sum('own_token'),
                'not_actiov_lots'=>No_actiov_lot::notActiveLot(),
                'actiov_lots' => Actiov_lot::activeLot(),
                'my_per_cent_of_token'=>Own_token_by_emission::myPercentOfToken($u_id),
                'fundsInvolved'=>Statistic::fundsInvolved($u_id),
                'tokenInAuction'=>Statistic::tokenInAuction($u_id),
                'ticker'=> Ticker::getTicker(),
                'referralReward'=>Statistic::referralReward($u_id)
            ]);
	}

//===================================//

    public function payeer() {
        $u_id = Auth::id();
        return view('user.finances.paymentSystems.payeer')->with([
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
            'ticker'=> Ticker::getTicker(),
        ]);

    }
    public function skrill() {
        $u_id = Auth::id();
        return view('user.finances.paymentSystems.skrill')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }
    public function paypal() {
        $u_id = Auth::id();
        return view('user.finances.paymentSystems.paypal')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }

    public function paybank() {
        $u_id = Auth::id();
        return view('user.finances.paymentSystems.paybank')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }

    public function kuna() {
        $u_id = Auth::id();
        return view('user.finances.paymentSystems.kuna')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }


    public function bestChange() {
        $u_id = Auth::id();
        return view('user.finances.paymentSystems.bestChange')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }


    public function replenishment() {
        $u_id = Auth::id();
        return view('user.finances.replenishment')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }

    public function withdrawFunds() {
        $u_id = Auth::id();
        return view('user.finances.withdrawFunds')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }

    public function transactionHistory() {
        $u_id = Auth::id();
        return view('user.finances.transactionHistory')->with([
            'ticker'=> Ticker::getTicker(),
            'bouth_new_tokens' => Purchased_tokens::where('u_id',$u_id)->get(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);

    }

    public function accountsWallets() {
        $u_id = Auth::id();
        return view('user.finances.accountsWallets')->with([
            'ticker'=> Ticker::getTicker(),
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);
    }

    public function homeFinance() {
        $u_id = Auth::id();

        $my_ref = Referral::getMyRefferalId($u_id);
        $user_my_ref = Arr::prepend($my_ref, $u_id);

        $users = User::whereIn('u_id',$user_my_ref)->select('u_id','name')->get();
        foreach ($users as $user){
            $start_time = new Carbon('01-01-2019');
            $present_time =  Carbon::today();
            $diff = $present_time->diffInMonths($start_time);

            $user_total_token = Own_token_by_emission::where('u_id',$user->u_id)->sum('own_token');
            $user_total_invest = Own_token_by_emission::where('u_id',$user->u_id)->sum('investment');
            $user = Arr::add($user, 'user_total_token',$user_total_token);
            $user = Arr::add($user, 'user_total_invest',$user_total_invest);
            $each_mounths = [];
            for ($i = 1; $i <= $diff+1; $i++)  {
                $present['sum_token'] = Own_token_by_emission::where('u_id',$user->id)->where('date',$start_time)->sum('own_token');
                $present['sum_invest'] = Own_token_by_emission::where('u_id',$user->id)->where('date',$start_time)->sum('investment');
                $present['rate'] = Token::where('date',$start_time)->first()->token_price;
                $present['date'] = $start_time->format('m-Y');
                $present['month'] = $start_time->format('m');
                $present['year'] = $start_time->format('Y');
                $present['present_moutrh'] = Own_token_by_emission::where('u_id',$user->u_id)->where('date',$start_time)->select('own_token','investment')->first();
                $each_mounths[] = $present;
                $start_time = $start_time->addMonths(1);
            }
            $user = Arr::add($user, 'each_mounths',$each_mounths);
        }
        $total_token =  Own_token_by_emission::whereIn('u_id',$user_my_ref)->sum('own_token');
        $total_investment =  Own_token_by_emission::whereIn('u_id',$user_my_ref)->sum('investment');

        return view('user.finances.homeFinance')->with([
            'total_token'=>$total_token,
            'total_investment'=>$total_investment,
            'ticker'=> Ticker::getTicker(),
            'users'=>$users,
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);
    }

    public function rewardHistory() {
        $u_id = Auth::id();

        $interes_from_refs_buy_token = Purchased_tokens_from_ref::where('u_id_to',$u_id)
            ->join('users','purchased_tokens_from_refs.u_id','=','users.u_id')
            ->select(['purchased_tokens_from_refs.transaction','purchased_tokens_from_refs.in_cash','purchased_tokens_from_refs.created_at','users.name'])
            ->get();
        $team = Referral::getMyRefferalId($u_id);
        $interes_from_refs_auctions = ActLOtHistory::getLotHistoriesTeam($team);
            foreach ($interes_from_refs_auctions as $interes_from_refs_auction){
                if(in_array($interes_from_refs_auction->seller_u_id,$team)){
                    $name_user = User::where('u_id', $interes_from_refs_auction->seller_u_id)->first()->name;
                    $interes_from_refs_auction = Arr::add($interes_from_refs_auction, 'seller_name', $name_user);
                }
                else if(in_array($interes_from_refs_auction->previous_price_user,$team)){
                    $name_user = User::where('u_id', $interes_from_refs_auction->previous_price_user)->first()->name;
                    $interes_from_refs_auction = Arr::add($interes_from_refs_auction, 'previous_name', $name_user);
                }
                else if(in_array($interes_from_refs_auction->lider_price_user,$team)){
                    $name_user = User::where('u_id', $interes_from_refs_auction->lider_price_user)->first()->name;
                    Arr::add($interes_from_refs_auction, 'lider_name', $name_user);
                }
            }
            $mergedCollection= $interes_from_refs_buy_token->toBase()->merge($interes_from_refs_auctions);
            $interest_from_refs = $mergedCollection->sortBy('created_at');
        return view('user.finances.rewardHistory')->with([
            'ticker'=> Ticker::getTicker(),
            'team'=>$team,
            'interest_from_refs'=>$interest_from_refs,
            'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
        ]);
    }
}
