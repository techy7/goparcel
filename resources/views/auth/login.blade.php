@extends('layouts.auth.app')

@section('title', __('auth.login'))

@section('content')
<div class="login-wrapper">
  <div class="bg-pic">
    <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
      <h1 class="semi-bold text-white">{{ strtoupper(config('app.name')) }}</h1>
      <p class="tagline">{{ config('app.description') }}</p>
    </div>
  </div>
  <div class="login-container bg-white">
    <div class="p-l-30 p-r-30 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
      <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center mb-4" width="200" height="89">

      <form id="form-login" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group form-group-default @error('username') has-error @enderror">
          <label>{{ __('auth.username') }}</label>
          <input type="text" name="username" value="{{ old('username') }}" placeholder="{{ __('auth.username') }}" class="form-control" required>
        </div>
        @error('username')
        <label class="error" for="username">{{ $message }}</label>
        @enderror

        <div class="form-group form-group-default  @error('password') has-error @enderror">
          <label>{{ __('auth.password') }}</label>
          <input type="password" name="password" placeholder="{{ __('auth.credentials') }}" class="form-control" required>
        </div>
        @error('password')
        <label class="error" for="password">{{ $message }}</label>
        @enderror

        <div class="row align-items-center">
          <div class="col-md-6 no-padding sm-p-l-15">
            <div class="form-check">
              <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember" id="remember">
              <label for="remember" class="small">{{ __('auth.remember_me') }}</label>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-center justify-content-end">
            <button class="btn btn-primary btn-lg btn-cons m-t-10 mr-0" type="submit">{{ __('auth.login') }}</button>
          </div>
        </div>

        <div class="m-b-5 m-t-30">
          <a href="{{ route('password.request') }}" class="small"><strong>{{ __('auth.lost_your_password') }}</strong></a>
        </div>
        <div>
          <a href="{{ route('register') }}" class="small"><strong>{{ __('auth.not_a_member_yet_sign_up_now') }}</strong></a>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection

@section('lower-links-extend')
<script>
$(function(){
  $('#form-login').validate();
})
</script>
@endsection
