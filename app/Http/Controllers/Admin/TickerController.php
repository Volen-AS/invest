<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticker;
use App\Models\Token;
use App\Http\Requests\AdminRequests\TickerRequest;

class TickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $arrTicker = Ticker::query();
        $arrTicker = $arrTicker->orderByDesc('id')->paginate(30);

        return view('admin.ticker')
            ->with('tokens_tables', Token::getTokenEmissionDividends())
            ->with('arrTicker', $arrTicker)
            ->with('ticker', Ticker::getTicker());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TickerRequest $request)
    {
        $old = Ticker::where('is_active', true)->first();
        if($old) {
            $old->is_active = false;
            $old->save();
        }

        $ticker = new Ticker();
        $ticker->info = $request->get('ticker');
        $ticker->is_active = true;
        $ticker->save();

        $arrTicker = Ticker::query();
        $arrTicker = $arrTicker->paginate(30);

        return redirect()->route('admin.ticker.index')
            ->with('tokens_tables', Token::getTokenEmissionDividends())
            ->with('arrTicker', $arrTicker)
            ->with('ticker', Ticker::getTicker());
    }


    public function togged(Ticker $ticker)
    {
        $oldTicker = Ticker::where('is_active', true)->first();
        $oldTicker->is_active = false;
        $oldTicker->save();

        $ticker->is_active = true;
        $ticker->save();

        return back()->with('success', 'Бігуча стрічка успішно змінина');
    }
}
