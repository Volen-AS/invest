@extends('layouts.app')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateNickName') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nickName" class="col-md-4 col-form-label text-md-right">NickName</label>

                            <div class="col-md-5">
                                <input id="nickName" type="text" class="form-control" name="nickName" value="{{ Auth::user()->name }}" required>

                                @if ($errors->has('nickName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nickName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary">
                                        Змінити
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('updateEmail') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="new_email" class="col-md-4 col-form-label text-md-right">E-Mail Адреса</label>

                            <div class="col-md-5">
                                <input id="new_email" type="email" class="form-control{{ $errors->has('new_email') ? ' is-invalid' : '' }}" name="new_email" value="{{ Auth::user()->email }}" required>

                                @if ($errors->has('new_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-1">
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary">
                                        Змінити
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form  method="POST" action="{{ route('changePassword') }}">
                        @csrf
                        <div class="form-group row {{ $errors->has('current-password') ? ' has-error' : '' }}">

                            <label for="new-password" class="col-md-4 col-form-label text-md-right">Введіть старий пароль</label>

                            <div class="col-md-5">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>

                                @if ($errors->has('current-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">Веддіть новий пароль</label>

                            <div class="col-md-5">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">Підтвердіть новий пароль</label>

                            <div class="col-md-5">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                            <div class="col-md-3 col-form-label">
                                <div class="submit">
                                    <button type="submit" class="btn btn-primary">
                                        Змінити
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
    <div id="footer">
    @include('layouts.footer')
    </div>
@endsection
