@extends('layouts.auth.app')

@section('title', __('auth.forgot_password'))

@section('content')
<div class="register-container full-height sm-p-t-40 sm-p-b-40">
  <div class="d-flex justify-content-center flex-column full-height">
    <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center" width="200" height="89">
    <div class="row p-t-15">
      <div class="col-md-12">
        <div class="card card-default">
          <div class="card-header">
            <div class="card-title">{{ __('auth.reset_password') }}</div>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-secondary" role="alert">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="form-group form-group-default required">
                <label for="email">{{ __('auth.email') }}</label>
                <input type="email" class="form-control required @error('email') has-error @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
              @error('email')<label id="email-error" class="error" for="email">{{ $message }}</label>@enderror

              <button aria-label="" class="btn btn-primary btn-lg btn-block" type="submit">{{ __('auth.send_password_reset_link') }}</button>
            </form>

            <p class="text-center m-t-10 mb-0"><a href="{{ route('login') }}" class="text-info small"><strong>{{ __('auth.back_to_login') }}</strong></a></p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
