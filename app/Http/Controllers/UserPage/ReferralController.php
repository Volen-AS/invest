<?php

namespace App\Http\Controllers\UserPage;

use App\Models\Chat_list_messegde;
use App\Models\Own_token_by_emission;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Referral;
use App\Models\Statistic;
use App\Models\Ticker;
use App\Models\Token;
use App\Models\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function structure(Request $request)
    {
        if ($request->user()->role === 9) {

            $referrals = Referral::where('reSendTo', Auth::id())->get();

            return view('user.referrals.structureVipUser')
                ->with('referrals', $referrals)
                ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()))
                ->with('ticker', Ticker::getTicker());
        }

        $referrals = Referral::where('referred_by', Auth::id())->get();

        return view('user.referrals.structure')
            ->with('referrals', $referrals)
            ->with('affiliate', $request->user()->getMyAffiliate())
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()))
            ->with('ticker', Ticker::getTicker());
    }

    public function referralForm(Request $request) {

        $user = $request->user();

        if($user->role == 9) {
            $referrals = Referral::where('reSendTo', $user->id)->get();

            return view('user.referrals.referralFormVipUser')
                ->with('referrals', $referrals)
                ->with('affiliate', $request->user()->getMyAffiliate())
                ->with('chat_messegdes', Chat_list_messegde::getMessegde($user->id))
                ->with('ticker', Ticker::getTicker());
        }


        $referrals = Referral::where('referred_by', Auth::id())->get();

        return view('user.referrals.referralForm')
            ->with('referrals', $referrals)
            ->with('affiliate', $request->user()->getMyAffiliate())
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()))
            ->with('ticker', Ticker::getTicker());
    }

    public function banners()
    {
        $user = Auth::user();
        $refLink = url('/register') .  '?ref=' . $user->code;

        return view('user.referrals.banners', compact('refLink'))
            ->with('chat_messegdes', Chat_list_messegde::getMessegde($user->id))
            ->with('ticker', Ticker::getTicker());
    }

    public function activeTeam()
    {
        return view('user.referrals.activeTeam')
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()))
            ->with('ticker', Ticker::getTicker());
    }

    public function privateChat()
    {
        return view('user.referrals.privateChat')
            ->with('chat_messegdes', Chat_list_messegde::getMessegde(Auth::id()))
            ->with('ticker', Ticker::getTicker());
    }

}
