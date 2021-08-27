<?php

namespace App\Http\Controllers\UserPage;

use App\Models\Chat_list_messegde;
use App\Models\Post;
use App\Models\Ticker;
use App\Models\Token;
use Auth;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function management($category, $post = null){
        $ticker = Ticker::getTicker();
        $u_id = Auth::id();
        if (is_null($post)) {
            $top_post = Post::where('category', $category)->latest()->first();
            if (empty($top_post)) {
                return view('user.newsUser')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
                    'ticker' => $ticker,
                    'top_post' => null, 'news' => null
                ]);
            } else {
                $news = Post::where('category', $category)->paginate(9);
                return view('user.newsUser')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'chat_messegdes' => Chat_list_messegde::getMessegde($u_id),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => $news, 'page'=>null
                ]);
            }
        }
        else {
            $top_post = Post::find($post);
            $news = Post::where('category', $category)->paginate(9);
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
