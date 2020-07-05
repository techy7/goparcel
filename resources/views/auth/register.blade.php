@extends('layouts.admin.app')

@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
      <img src="{{ asset('pages/assets/img/logo.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/logo.png') }}" data-src-retina="{{ asset('pages/assets/img/logo_2x.png') }}" width="78" height="22">
      <h3>Pages makes it easy to enjoy what matters the most in your life</h3>
      <p>
        Create a pages account. If you have a facebook account, log into it for this process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
      </p>
      <form id="form-register" class="p-t-15" role="form" action="index.html">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <label>Username</label>
              <input type="text" name="uname" placeholder="Enter username" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <label>Email</label>
              <input type="email" name="email" placeholder="We will send loging details to you" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <label>Password</label>
              <input type="password" name="pass" placeholder="Minimum of 4 Charactors" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <label>Name</label>
              <input type="text" name="fname" placeholder="John" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <label>Mobile Number</label>
              <input type="text" name="lname" placeholder="Smith" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group form-group-default">
              <label>Address</label>
              <input type="text" name="lname" placeholder="Smith" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="row m-t-10">
          <div class="col-lg-6">
            <p><small>I agree to the <a href="#" class="text-info">Pages Terms</a> and <a href="#" class="text-info">Privacy</a>.</small></p>
          </div>
          <div class="col-lg-6 text-right">
            <a href="#" class="text-info small">Help? Contact Support</a>
          </div>
        </div>
        <button aria-label="" class="btn btn-primary btn-cons m-t-10" type="submit">Create a new account</button>
      </form>
    </div>
  </div>
@endsection