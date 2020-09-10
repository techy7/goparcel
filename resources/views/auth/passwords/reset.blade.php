@extends('layouts.auth.app')

@section('title', __('auth.reset_password'))

@section('content')
<div class="forgot-password-container full-height sm-p-t-40 sm-p-b-40">
  <div class="d-flex justify-content-center flex-column full-height">
    <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center" width="200" height="89">
    <div class="row p-t-15">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <div class="card-title">{{ __('auth.reset_password') }}</div>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <div class="form-group form-group-default required">
                <label for="email">{{ __('auth.email') }}</label>
                <input type="email" id="email" class="form-control required @error('email') has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>

              <div class="form-group form-group-default required">
                <label for="password">{{ __('auth.password') }}</label>
                <input type="password" id="password" class="form-control required @error('password') has-error @enderror" name="password" required>
              </div>
              @error('password')<label id="password-error" class="error" for="password">{{ $message }}</label>@enderror

              <div class="form-group form-group-default required">
                <label for="password-confirmation">{{ __('auth.confirm_password') }}</label>
                <input type="password" id="password-confirmation" class="form-control required @error('password') has-error @enderror" name="password_confirmation" required>
              </div>

              <button aria-label="" class="btn btn-primary btn-lg btn-block" type="submit">{{ __('auth.reset_password') }}</button>
            </form>

            <p class="text-center m-t-10 mb-0"><a href="{{ route('login') }}" class="text-info small"><strong>{{ __('auth.back_to_login') }}</strong></a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
