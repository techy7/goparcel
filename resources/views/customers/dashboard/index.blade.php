@extends('layouts.pages.app')

@section('title', __('general.dashboard'))

@section('content')
<div class="content sm-gutter">
  <div class="container-fluid padding-25 sm-padding-10">
    <div class="container-fixed-lg">
      <div class="row">
        <div class="col-md-6">
          <div class="pull-left">
            <h2 class="page-title">{{ __('general.dashboard') }}</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4 m-b-10">
          <div class="widget-9 card no-margin">
            <div class="full-height d-flex flex-column">
              <div class="card-header">
                <div class="card-title">
                  <span class="font-montserrat fs-11 all-caps">{{ __('general.my_pickup_booking') }}</span>
                </div>
              </div>
              <div class="card-body">
                <div class="p-l-20 p-r-20">
                  @if ($userNumberBookings)
                  <h3 class="mt-0 m-b-20">{{ $userNumberBookings }}</h3>
                  @else
                  <p>{{ __('general.you_dont_have_any_bookings_yet') }}</p>
                  @endif
                </div>
              </div>
              <div class="card-footer bg-white border-top-0">
                  <a href="{{ route('customer.pickup', auth()->user()->username) }}" class="btn btn-primary btn-cons text-white btn-sm-block pull-right">{{ __('general.book_now') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 m-b-10">
          <div class="widget-9 card no-margin">
            <div class="full-height d-flex flex-column">
              <div class="card-header">
                <div class="card-title">
                  <span class="font-montserrat fs-11 all-caps">{{ __('general.track_delivery') }}</span>
                </div>
              </div>
              <div class="card-body">
                <div class="p-l-20 p-r-20">
                  
                </div>
              </div>
              <div class="card-footer bg-white border-top-0">
                <p class="no-margin d-flex align-items-end justify-content-end"><a href="{{ route('customer.bookings.searchTrack',  auth()->user()->username) }}" class="btn btn-primary btn-cons text-white btn-sm-block">{{ __('general.go_to_track_delivery') }}</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 m-b-10">
          <div class="widget-9 card no-margin">
            <div class="full-height d-flex flex-column">
              <div class="card-header">
                <div class="card-title">
                  <span class="font-montserrat fs-11 all-caps">{{ __('general.packages_rate') }}</span>
                </div>
              </div>
              <div class="p-l-20 p-r-20">
                @foreach ($packages as $package)
                <div class="row">
                  <div class="col-8">
                    <div class="push-left">
                      <small>{{ $package->name }}</small>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="push-right text-right">
                      <small>{{ __('general.amount_peso', ['field' => number_format($package->amount,2)]) }}</small>
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
</div>
@endsection
