@extends('admin.layouts.app')

@section('content')
    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_information_contact">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 primery_information_contact">
                    <div class="primery_information ">
                        <div class="bloks_news">

                            <div class="container">
                                    <div class="information_bloks_news">
                                        <div class="for_pos_img_bloks_news"><img src="{{ $post->news_pic }}" alt="" class="img_bloks_news"></div>
                                        <h4 class="title_bloks_news">{{ $post->name }}</h4>
                                        <p class="content_bloks_news">{{ $post->post }}</p>
                                        <div class="data_bloks_news">{{ $post->created_at }}</div>
                                    </div>
                                    <div style="clear:both"></div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                    <div class="text">
                        <div>
                            <a  href="{{ route('admin.posts.index') }}">
                                <button type="button" class="btn btn-link">Повернутися до новин</button>
                            </a>
                        </div>
                        <div class="mt-3">
                            <a  href="{{ route('admin.posts.edit', $post) }}">
                                <button type="button" class="btn btn-warning">Редагувати </button>
                            </a>
                        </div>

                        <div class="mt-3">
                            {{ Form::open([
                                        'route' => ['admin.posts.destroy',$post],
                                        'method' => 'delete',
                                    ]) }}
                            <button type="submit" class="btn btn-danger">Видалити</button>

                            {{ Form::close() }}
                        </div>

                     </div>

                </div>
        </div>

    </div>
    </div>




<div id="footer">
    @include('admin.layouts.footer')
</div>

@endsection
