@extends('layouts.auth.app')

@section('title', __('auth.reset_password'))

@section('content')
<div class="register-container full-height sm-p-t-40 sm-p-b-40">
  <div class="d-flex justify-content-center flex-column full-height ">
    <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center" width="200" height="89" style="margin-top: -50px">
    <div class="row m-t-10">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('auth.reset_password') }}</div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
