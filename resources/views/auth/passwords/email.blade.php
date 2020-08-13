@extends('layouts.auth.app')

@section('title', __('auth.forgot_password'))

@section('content')
<div class="register-container full-height sm-p-t-40 sm-p-b-40">
    <div class="d-flex justify-content-center flex-column full-height ">
        <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center" width="200" height="89" style="margin-top: -50px">
        <div class="row m-t-10">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>
            
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-secondary" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
            
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
