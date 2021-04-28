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
                        <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 title_form_add_new text-md-right" >Вибиріть категорію</label>

                                <div class="col-md-8">
                                    <select name="category_id" class="form-control{{ $errors->has('article') ? ' is-invalid' : '' }}" style="height:35px;width: 100%" required>
                                        @foreach($categories as $key => $category)
                                            <option value="{{$key}}">{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 title_form_add_new text-md-right">Назва новини:</label>

                                <div class="col-md-8">
                                    <input type="text" id="name" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="назва новини є унікальною і не має повторюватися" style="width: 100%;height:35px" required>
                                    @if ($errors->has('article'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('article') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="post" class="col-md-4 title_form_add_new text-md-right">Головна частина</label>
                                <div class="col-md-8">
                                    <textarea id="post" type="text" name="post" class="form-control{{ $errors->has('post') ? ' is-invalid' : '' }}" style="width: 100%; min-height: 300px;" required></textarea>
                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 title_form_add_new text-md-right">Картнка статті:</label>

                                <div class="col-md-6">
                                    <div class="container">
                                        <label class="label" for="input"></label>

                                        <div class="input">
                                            <input name="news_pic" id="file" type="file" class="form-control{{ $errors->has('news_pic') ? ' is-invalid' : '' }}" style="width: 100%;" required>
                                            @if ($errors->has('news_pic'))
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $errors->first('news_pic') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="add_new_action_admin">
                                      Додати Новину
                                    </button>

                                </div>
                            </div>
                        </form>
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
