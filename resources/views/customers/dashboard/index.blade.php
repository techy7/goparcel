@extends('layouts.pages.app')

@section('title', 'Dashboard')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">

      <div class="container-fixed-lg">
        <div class="row">
            <div class="col-md-6">
                <div class="pull-left">
                    <h3 class="page-title">Dashboard</h3>
                </div>
            </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 m-b-10">
          <div class="widget-9 card bg-color-1 no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title">
                  <span class="font-montserrat fs-11 all-caps">My Bookings </span>
                </div>
              </div>
              <div class="p-l-20 ">
                <h4 class="no-margin">{{ $userNumberBookings ?? 'You don\'t have any bookings yet.' }}</h4>
                <p>See your bookings <a href="{{ route('customer.bookings', auth()->user()->username) }}" style="color: white !important">here</a>.</p>
                <a href="{{ route('customer.pickup', auth()->user()->username) }}" class="btn btn-outline-default">Book Now</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 m-b-10">
          <div class="widget-9 card bg-color-2 no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title">
                  <span class="font-montserrat fs-11 all-caps">Track your Order </span>
                </div>
              </div>
              <div class="p-l-20">
                <h3 class="no-margin p-b-5">
                  <a href="{{ route('track-delivery') }}" target="_blank" class="btn btn-outline-default">Track My Order</a>
                </h3>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 m-b-10">
          <div class="widget-9 card bg-color-3 no-margin widget-loader-bar">
            <div class="full-height d-flex flex-column">
              <div class="card-header ">
                <div class="card-title">
                  <span class="font-montserrat fs-11 all-caps">Packages Rate </span>
                </div>
              </div>
              <div class="p-l-20">
                @foreach ($packages as $package)
                <div class="row">
                  <div class="col-6">
                    <div class="push-left">
                      {{ $package->name }}
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="push-right">
                      P{{ $package->amount }}.00
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
