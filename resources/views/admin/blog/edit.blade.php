<?php /** @var \App\Models\Post $post */ ?>
@extends('admin.layouts.app')

@section('content')

    <div id="primery_window">
        <div class="for_position_top_line"></div>
        <div class="primery_windon_welc">
            <div class="row">
                <div class="col-lg12 col-md12 col-sm-12">
                    <div class="card">
                        <div class="card-header"><h2>Створити Новину</h2></div>

                        <div class="card-body">

                            {{ Form::open([
                                      'route' => ['admin.posts.update',$post],
                                      'method' => 'patch',
                                      'role' => 'form',
                                      'enctype' => 'multipart/form-data',
                                  ]) }}
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 title_form_add_new text-md-right" >Назва новини:</label>
                                    <div class="col-md-8">
                                        {{ Form::text('name', old('name', $post->name), ['class' => 'form-control ' . ($errors->has('name') ? ' is-invalid' : ''), 'id' => 'name', 'required']) }}
                                        @if($errors->has('name'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <button type="submit" class="add_new_action_admin">
                                            Змінити Новину
                                        </button>

                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>

        <div class="for_position_bottom_line"></div>
    </div>
    <div id="footer">
        @include('admin.layouts.footer')
    </div>
@endsection
