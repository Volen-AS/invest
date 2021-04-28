<?php

namespace App\Http\Controllers;

use App\Models\Ticker;
use Illuminate\Http\Request;
use App\Models\OurEvent;
use App\Models\Post;
use App\Models\Token;
use App\Models\Monthly_rate;


class IndexController extends Controller
{

    public function index() {
        return view('welcome')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function tokenPrice() {
        return view('guest.tokenPrice')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function contact() {
        return view('guest.contact')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function OurEvent() {

         $ourEvents = OurEvent::get();

            return view('guest.action')->with([
                'tokens_tables'=>Token::getTokenEmissionDividends(),
                'ticker'=> Ticker::getTicker(),
                'ourEvents' => OurEvent::orderBy('created_at','DESC')->get()
            ]);
    }

    public function news() {
         $news = News::all()->count();
            return view('guest.news')->with([
                'tokens_tables'=>Token::getTokenEmissionDividends(),
                'ticker'=> Ticker::getTicker(),
                'news' => News::orderBy('created_at','DESC')->get()
            ]);
    }


    public function siteRules() {
        return view('guest.siteRules')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);

    }
    public function ZMIaboutUs() {
        return view('guest.ZMIaboutUs')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function affilProg() {
        return view('guest.affilProg')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function UserAgree() {
        return view('guest.userAgree')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function chat() {
        return view('guest.chat')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function networks() {
        return view('guest.networks')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function chargeableSystems() {
        return view('guest.finences.paySys')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function multicurrency() {
        return view('guest.finences.multicurrency')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function tokenAuction() {
        return view('guest.finences.tokenAuction')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function protectionFund() {
        return view('guest.finences.protectionFund')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function investmentPortfolio() {
        return view('guest.finences.investmentPortfolio')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function typeRewards() {
        return view('guest.finences.typeRewards')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function dividends() {
        return view('guest.finences.dividends')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function referralReward() {
        return view('guest.finences.referralReward')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function typesOfInvestmentRewards() {
        return view('guest.finences.typesOfInvestmentRewards')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
    public function part_1() {
        return view('guest.security.part_1')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
     public function part_2() {
        return view('guest.security.part_2')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
     public function part_3() {
        return view('guest.security.part_3')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }

    public function part_4() {
        return view('guest.security.part_4')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker(),
        ]);
    }
}
