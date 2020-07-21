@extends('layouts.auth.app')

@section('title', 'Register')

@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
      <img src="{{ asset('pages/assets/img/logo.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/logo.png') }}" data-src-retina="{{ asset('pages/assets/img/logo_2x.png') }}" width="78" height="22">
        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default @error('username') has-error @enderror">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter username" value="{{ old('username') }}" class="form-control" required>
                </div>
                @error('username')
                    <label class="error" for="username">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default @error('email') has-error @enderror">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email" value="{{ old('email') }}" class="form-control" required>
                </div>
                @error('email')
                    <label class="error" for="email">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-default @error('password') has-error @enderror">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter password" class="form-control" required>
                </div>
                @error('password')
                    <label class="error" for="password">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-default">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Enter confirm password" class="form-control" required>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default @error('name') has-error @enderror">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter name" value="{{ old('name') }}" class="form-control" required>
                </div>
                @error('name')
                    <label class="error" for="name">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default @error('m_number') has-error @enderror">
                    <label>Mobile Number</label>
                    <input type="text" name="m_number" placeholder="Enter mobile number" value="{{ old('m_number') }}" class="form-control" required>
                </div>
                @error('m_number')
                    <label class="error" for="m_number">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group form-group-default @error('address') has-error @enderror">
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Enter Address" value="{{ old('address') }}" class="form-control" required>
                </div>
                @error('address')
                    <label class="error" for="address">
                        {{ $message }}
                    </label>
                @enderror
            </div>
            </div>
                    <input type="hidden" name="roles" value="3">
            <div class="row m-t-10">
                <p>Sign in with <a href="#" class="text-info">Facebook</a></p>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
      </form>
    </div>
  </div>
@endsection