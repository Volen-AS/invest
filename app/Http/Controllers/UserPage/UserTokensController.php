<?php

namespace App\Http\Controllers\UserPage;

use App\Http\Controllers\Controller;
use App\Models\Actiov_lot;
use App\Models\ActLOtHistory;
use App\Models\Chat_list_messegde;
use App\Models\No_actiov_history;
use App\Models\No_actiov_lot;
use App\Models\Own_token_by_emission;
use App\Models\Referral;
use App\Models\Ticker;
use App\Models\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class UserTokensController extends Controller
{
    public $tinker;

    public function __construct()
    {
        $this->tinker = Ticker::getTicker();
    }

    public function ownTokens(Request $request)
    {
        $user = $request->user();
        $sumInvest = $user->OwnTokenByEmission()->sum('investment');
        $sumToken = $user->OwnTokenByEmission()->sum('own_token');

        $tableOwnTokens = $user->OwnTokenByEmission;

        foreach ($tableOwnTokens as $tableOwnToken){
            $tokeInAuctionActin =  Actiov_lot::where(['seller_u_id' => $user->id, 'emission_period' => $tableOwnToken->date])->sum('amount_token_lot');
            $tokeInAuctionNoActin = No_actiov_lot::where(['seller_u_id' => $user->id, 'emission_period' => $tableOwnToken->date])->sum('amount_token_lot');
            Arr::add($tableOwnToken,'total_token_in_auction',$tokeInAuctionNoActin + $tokeInAuctionActin);
        }

        return view('user.tokens.ownTokens')
            ->with('chat_messegdes',Chat_list_messegde::getMessegde($user->id))
            ->with('table_own_tokens', $tableOwnTokens)
            ->with('sum_invest',$sumInvest)
            ->with('sum_token',$sumToken)
            ->with('min_lot',Own_token_by_emission::minLot())
            ->with('ticker', $this->tinker);
    }

    public function activeLots()
    {
        return view('user.tokens.activeLot')
            ->with('ActLOtHistores', ActLOtHistory::getAllLotHistories())
            ->with('rateTokenToday', Token::getRateTokenToday())
            ->with('actiov_lots', Actiov_lot::activeLot())
            ->with('ticker', $this->tinker)
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()));
    }

    public function noActive()
    {
        return view('user.tokens.noActive')
            ->with('no_actiov_histores', No_actiov_history::getAllLotHistories())
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()))
            ->with('ticker', $this->tinker)
            ->with('not_actiov_lots', No_actiov_lot::notActiveLot());
    }

    public function historyTrades(Request $request)
    {
        $user = $request->user();

        return view('user.tokens.historyTrades')
            ->with('sellerActiveLots', $user->userSellActiveLotHistories)
            ->with('previousPriceActiveLots', $user->userPreviousPriceActiveLotHistories)
            ->with('leaderPriceActiveLots', $user->userLeaderPriceActiveLotHistories)
            ->with('sellerNotActiveLots', $user->userSellerNotActiveLotHistories)
            ->with('firstBuyerNotActiveLots', $user->userFirstBuyerNotActiveLotHistories)
            ->with('ticker', $this->tinker)
            ->with('chat_messegdes', Chat_list_messegde::getMessegde($user->id));
    }

    public function historyReferralLot() {
        $u_id = Auth::id();
        $team = Referral::getMyRefferalId($u_id);
        $historiesActLotTeams = ActLOtHistory::getLotHistoriesTeam($team);
        $historiesNotActLotTeams = No_actiov_history::getPassLolHistoryTeam($team);

        return view('user.tokens.historyRefferalLot')
            ->with('team',$team)
            ->with('historiesActLotsTeams',$historiesActLotTeams)
            ->with('historiesNotActLotTeams',$historiesNotActLotTeams)
            ->with('ticker',$this->tinker)
            ->with('chat_messegdes',Chat_list_messegde::getMessegde($u_id));
    }

    public function referralsTokens() {

        return view('user.tokens.referralsTokens')
            ->with('ticker', $this->tinker)
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()));
    }
}
