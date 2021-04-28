@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_information_contact">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 primery_information_contact">
                    <div class="primery_information ">
                        <div class="bloks_news">
                            @if($top_post)

                            <div class="information_bloks_news">
                                <div class="for_pos_img_bloks_news"><img src="{{ $top_post->news_pic }}" alt="" class="img_bloks_news"></div>
                                <h4 class="title_bloks_news">{{ $top_post->article }}</h4>
                                <p class="content_bloks_news">{{ $top_post->text }}</p>
                                <div class="data_bloks_news">{{ $top_post->created_at }}</div>
                            </div>
                            <div style="clear:both"></div>

                            @else
                            Новини по даній категорії ще не створено
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    @include('layouts.sidebar')
                </div>
            </div>
            <div class="container">
                @if(!is_null($news))
                    @foreach($news as $new)
                            <div class="primery_blocks_fund">
                                <h5>{{$new->article}}</h5>
                                <div class="top_bgc_block_fund"></div>
                                <div class="content_block_fund">
                                    <div><img src="{{ asset($new->news_pic) }}" style="weight:100%"></div>
                                </div>

                                <div class=" detail_block_fund"><a href="{{ url('admin/news',[$new->category, $post=$new->id]) }}">Детальніше...</a></div>
                            </div>

                    @endforeach
                @else
                @endif
                @if(!empty($news))
                 {{ $news->render() }}
                @endif
            </div>

        </div>

    </div>

    <div id="footer">
        @include('admin.layouts.footer')
    </div>
@endsection
