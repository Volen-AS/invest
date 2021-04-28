<?php

namespace App\Http\Controllers\Admin;

use App\Models\No_actiov_lot;
use App\Models\Ticker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Own_token_by_emission;
use App\Models\Token;

class TokenController extends Controller
{
    public function adminOwnTokens()
    {
        return view('admin.token.ownTokens')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'each_mounths' => Token::tokenByMounth(),
            'totalToken' => Own_token_by_emission::totalToken(),
            'totalInvest' => Own_token_by_emission::totalInvest(),
            'ticker'=> Ticker::getTicker()
        ]);
    }

    public function notActiveLot()
    {
        $not_active_lots = No_actiov_lot::notActiveLot();
        return view('admin.token.notActiveLot')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'not_active_lots'=>$not_active_lots,
            'ticker'=> Ticker::getTicker()
        ]);
    }
}
