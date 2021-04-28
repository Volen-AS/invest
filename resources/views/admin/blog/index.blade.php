@extends('admin.layouts.app')

@section('content')
    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">

                <div class="row">
                    <div class="col-6">
                        <h2>Новини  -  {{ $posts->total() }}</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Створини новину
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Назва</th>
                                    <th>Категорія</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr >
                                        <td> {{ $post->id }} </td>
                                        <td> {{$post->name }} </td>
                                        <td>{{ $post->category->name }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.posts.show', $post) }}" title="Show">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>
                                            <a href="{{ route('admin.posts.edit', $post) }}" title="Edit">
                                                <i class="fas fa-pencil-alt text-warning"></i>
                                            </a>

                                            <a href="{{ route('admin.posts.destroy', $post) }}" title="Delete" data-method="delete"  data-confirm="Ви впевнені, що хочете видалити статтю?">
                                                <i class="fas faw fa-trash-alt text-danger"></i>
                                            </a>

{{--                                            {{ Form::open([--}}
{{--                                                  'route' => ['admin.posts.destroy',$post],--}}
{{--                                                  'method' => 'delete',--}}
{{--                                              ]) }}--}}
{{--                                                 <button type="submit"><i class="fas faw fa-trash-alt text-danger"></i></button>--}}
{{--                                            {{ Form::close() }}--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div>
                                <div class="col-6">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="for_position_bottom_line"></div>
    <div id="footer">
        @include('admin.layouts.footer')
    </div>
@endsection
