<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Ticker;
use App\Models\Token;
use Illuminate\Http\Request;

class GuestsNewsController extends Controller
{
    public function managementG($category, $post = null){
        $ticker = Ticker::getTicker();
        if (is_null($post)) {
            $top_post = Post::where('category', $category)->latest()->first();
            if (empty($top_post)) {
                return view('guest.management')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'ticker' => $ticker,
                    'top_post' => null, 'news' => null
                ]);
            } else {
                $news = Post::where('category', $category)->paginate(9);
                return view('guest.management')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => $news, 'page'=>null
                ]);
            }
        }
        else {
            $top_post = Post::find($post);
            $news = Post::where('category', $category)->paginate(9);
            if (empty($news)) {
                return view('guest.management')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => null
                ]);
            } else {
                return view('guest.management')->with([
                    'tokens_tables'=>Token::getTokenEmissionDividends(),
                    'ticker' => $ticker,
                    'top_post' => $top_post, 'news' => $news
                ]);
            }

        }
    }
}
