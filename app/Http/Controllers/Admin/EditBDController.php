<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Own_token_by_emission;
use App\Models\Ticker;
use App\Models\Token;
use App\Models\User;

class EditBDController extends Controller
{
    public function BDOwnTokens()
    {
        $each_mounths = Token::tokenByMounth();
        return view('admin.Edit_BD.BDownToken')->with([
            'tokens_tables' => Token::getTokenEmissionDividends(),
            'each_mounths' => $each_mounths,
            'totalToken' => Own_token_by_emission::totalToken(),
            'totalInvest' => Own_token_by_emission::totalInvest(),
            'ticker' => Ticker::getTicker()
        ]);
    }

    public function InvestorBudget()
    {
        $users = User::where('role', 7)
            ->join('statistics', 'users.u_id', '=', 'statistics.u_id')
            ->select('users.name', 'users.email', 'statistics.total_balance')
            ->get();

        return view('admin.Edit_BD.investor_budget')->with([
            'tokens_tables' => Token::getTokenEmissionDividends(),
            'ticker' => Ticker::getTicker(),
            'users' => $users
        ]);
    }

}
