@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header">Profile</div>
        <div class="card-body">
            <form method="POST" action="{{ route('edit-profile') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="first_name"  class="col-md-4 col-form-label text-md-right">Ваше ім'я:</label>
                    <div class="col-md-6">
                    {{ Form::text('first_name', old('first_name', $profile->first_name ?? null), ['class' => 'form-control ' . ($errors->has('first_name') ? ' is-invalid' : ''), 'id' => 'first_name']) }}
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </div>
                    @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="last_name"  class="col-md-4 col-form-label text-md-right">Ваше прізвище:</label>
                    <div class="col-md-6">
                        {{ Form::text('last_name', old('last_name', $profile->last_name ?? null), ['class' => 'form-control ' . ($errors->has('last_name') ? ' is-invalid' : ''), 'id' => 'last_name']) }}
                        @if($errors->has('last_name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="second_name"  class="col-md-4 col-form-label text-md-right">По батькові:</label>
                    <div class="col-md-6">
                        {{ Form::text('second_name', old('second_name', $profile->second_name ?? null), ['class' => 'form-control ' . ($errors->has('second_name') ? ' is-invalid' : ''), 'id' => 'second_name']) }}
                        @if($errors->has('second_name'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('second_name') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_number"  class="col-md-4 col-form-label text-md-right">Ваш номер телефону</label>
                    <div class="col-md-6">
                        {{ Form::text('phone_number', old('phone_number', $profile->phone_number ?? null), ['class' => 'form-control ' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'id' => 'phone_number', 'placeholder' => '+380661122333']) }}
                        @if($errors->has('phone_number'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reserve_phone_number"  class="col-md-4 col-form-label text-md-right">Додатковий телефон:</label>
                    <div class="col-md-6">
                        {{ Form::text('reserve_phone_number', old('reserve_phone_number', $profile->reserve_phone_number ?? null), ['class' => 'form-control ' . ($errors->has('reserve_phone_number') ? ' is-invalid' : ''), 'id' => 'reserve_phone_number', 'placeholder' => '+380661122333']) }}
                        @if($errors->has('reserve_phone_number'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('reserve_phone_number') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="reserve_mail"  class="col-md-4 col-form-label text-md-right">Додаткова пошта:</label>
                    <div class="col-md-6">
                        {{ Form::text('reserve_mail', old('reserve_mail', $profile->reserve_mail ?? null), ['class' => 'form-control ' . ($errors->has('reserve_mail') ? ' is-invalid' : ''), 'id' => 'reserve_mail']) }}
                        @if($errors->has('reserve_mail'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('reserve_mail') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="skype"  class="col-md-4 col-form-label text-md-right">Skype:</label>
                    <div class="col-md-6">
                        {{ Form::text('skype', old('skype', $profile->skype ?? null), ['class' => 'form-control ' . ($errors->has('skype') ? ' is-invalid' : ''), 'id' => 'skype']) }}
                        @if($errors->has('skype'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('skype') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"  name="agreement_profile" id="agreement_profile"  required>

                            <label class="form-check-label" for="agreement_profile">
                                 Даю згоду на обробку моїх персональних даних.
                            </label>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-primary btn-lg"> {{ __('Змінити профіль') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <div style="clear: both;"></div>
    </div>
</div>
  <div id="footer">
  @include('layouts.footer')
    <div style="clear: both;"></div>
  </div>
@endsection
