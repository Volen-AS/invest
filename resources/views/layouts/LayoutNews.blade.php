
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
                <div>
                    Новини по даній категорії ще не створено
                </div>
            @endif
        </div>
</div>
<div class="container">
    @if(count($news))
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
</div>
    @if(count($news) >= 9)
        {{ $news->render() }}
    @endif

{{--<div>--}}
{{--  @if($news->count())--}}
{{--    @foreach($news as $new)--}}
{{--    <div class="bloks_news">--}}
{{-- --}}
{{--      <div class="information_bloks_news">--}}
{{--        <div class="for_pos_img_bloks_news"><img src="{{ $new->news_pic }}" alt="" class="img_bloks_news"></div>--}}
{{--        <h4 class="title_bloks_news">{{ $new->article }}</h4>--}}
{{--        <p class="content_bloks_news">{{ $new->text }}</p>--}}
{{--       <div class="data_bloks_news">{{ $new->created_at }}</div>--}}
{{--      </div>--}}
{{--      <div style="clear:both"></div>--}}
{{--    </div>--}}
{{--    @endforeach--}}
{{--   @else--}}
{{--    <p> Новини ще не створені</p>--}}
{{--  @endif--}}
{{--</div>--}}
