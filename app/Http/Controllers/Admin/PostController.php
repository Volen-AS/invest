<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\Ticker;
use App\Models\Token;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use App\Http\Requests\AdminRequests\NewsRequest;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public $message;

    private int $paginate = 25;

    public function __construct()
    {
        $this->message = Ticker::getTicker();
    }


    public function index()
    {
        $posts = Post::with('category')->paginate($this->paginate);

        return view('admin.blog.index')
            ->with('posts', $posts)
            ->with('tokens_tables', Token::getTokenEmissionDividends())
            ->with('ticker', $this->message);
    }

    public function show(Post $post)
    {
        return view('admin.blog.show')
            ->with('post', $post)
            ->with('ticker', $this->message)
            ->with('tokens_tables', Token::getTokenEmissionDividends(),);
    }

    public function create()
    {
        return view('admin.blog.create')
            ->with('categories', Category::getCategoriesDropBox())
            ->with('ticker', $this->message);
    }

    public function store(NewsRequest $request)
    {
        $post = new Post();
        $post->category_id = $request->get('category_id');
        $post->code = Str::snake($request->get('name'));
        $post->name = $request->get('name');
        $post->post = $request->get('post');

        $file = $request->file('news_pic');
        $file->move(public_path() . '/uploads/news/', $file->getClientOriginalName());
        $url = URL::to("/") . '/uploads/news/' . $file->getClientOriginalName();

        $post->news_pic = $url;
        $post->save();

        return redirect()->route('admin.posts.show', $post)
            ->with('success', "Статтю додано до бібліотеки")
            ->with('ticker',$this->message);
    }

    public function edit(Post $post)
    {
        return view('admin.blog.edit')
            ->with('post', $post)
            ->with('categories',Category::getCategoriesDropBox())
            ->with('ticker', $this->message);
    }

    public function update(NewsRequest $request, Post $post)
    {
        $post->category_id = $request->get('category_id');
        $post->code = Str::snake($request->get('name'));
        $post->name = $request->get('name');
        $post->post = $request->get('post');
        if($request->file('news_pic')){

            $file = $request->file('news_pic');
            $file->move(public_path() . '/uploads/news/', $file->getClientOriginalName());
            $url = URL::to("/") . '/uploads/news/' . $file->getClientOriginalName();

            $post->news_pic = $url;
        }
        $post->save();

        return redirect()->route('admin.posts.show', $post)
            ->with('success', "Статтю #{$post->id} успішно змінено")
            ->with('ticker',$this->message);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', "Статтю #{$post->id} успішно змінено")
            ->with('ticker',$this->message);

    }
}

