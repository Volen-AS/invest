<?php

namespace App\Http\Controllers\Admin;


use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticker;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{

    public function index()
    {
        return view('admin.admin')->with([
            'tokens_tables'=>Token::getTokenEmissionDividends(),
            'ticker'=> Ticker::getTicker()
        ]);
    }
}


