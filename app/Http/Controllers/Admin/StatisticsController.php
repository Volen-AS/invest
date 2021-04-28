<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticker;
use App\Models\ActLOtHistory;
use App\Models\No_actiov_history;
use App\Models\Token;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function auctionHistory(){
        $historiesActLots = ActLOtHistory::getAllLotHistories();
        $historiesPassLots = No_actiov_history::getAllLotHistories();
        return view('admin.Statistics.auctionHistory')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'historiesActLots' => $historiesActLots,
            'historiesPassLots'=>$historiesPassLots,
            'ticker'=> Ticker::getTicker()
        ]);
    }
}
