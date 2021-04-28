<?php

namespace App\Http\Controllers\UserPage;

use App\Chat_list_messegde;
use App\News;
use App\Ticker;
use App\Token;
use Auth;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function management($category, $post = null){
        $ticker = Ticker::getTicker();
        $u_id = Auth::id();
        if (is_null($post)) {
            $top_post = News::where('category', $category)->latest()->first();
            if (empty($top_post)) {
                return view('user.newsUser')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
                    'ticker' => $ticker,
                    'top_post' => null, 'news' => null
                ]);
            } else {
                $news = News::where('category', $category)->paginate(9);
                return view('user.newsUser')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => $news, 'page'=>null
                ]);
            }
        }
        else {
            $top_post = News::find($post);
            $news = News::where('category', $category)->paginate(9);
            if (empty($news)) {
                return view('user.newsUser')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => null
                ]);
            } else {
                return view('user.newsUser')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => $news
                ]);
            }

        }
    }
}
