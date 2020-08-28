@extends('layouts.pages.app')

@section('title', 'My Pickup Bookings')

@section('upper-links-extend')
  <link href="{{ asset('pages/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('pages/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('pages/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
@endsection

@section('content')
<div class="content sm-gutter">
  <div class="container-fluid padding-25 sm-padding-10">
    <div class="container-fixed-lg">
      <div class="row">
        <div class="col-md-12">
          <h3 class="page-title">{{ __('general.my_pickup_booking') }}</h3>
        </div>
      </div>
    </div>

    @include('layouts.pages.session')

    <div class="container-fixed-lg bg-white">
      <div class="card card-transparent">
        <div class="card-header ">
          <div class="pull-right">
          <div class="col-xs-12">
            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
          </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
          <thead>
            <tr>
            <th>Pickup Schedule</th>
            <th style="width:30%">Recipient</th>
            <th>Tracking Number</th>
            <th>Delivery Status</th>
            <th>Package Type</th>
            <th>Total Amount</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach (auth()->user()->pickups as $pickup)
            <tr>
              <td class="v-align-middle semi-bold">
                <p>{{ $pickup->created_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
              </td>
              <td class="v-align-middle semi-bold">
                <p>{{ $pickup->receiver_name }}</p>
                <p class="small">{{ $pickup->receiver_email }} | {{ $pickup->receiver_phone }} </p> 
                <p class="small"></p>
                <p class="small">{{ $pickup->receiver_address}}, {{$pickup->receiver_state}}, {{ $pickup->receiver_postal_code   }}</p>
              </td>
              <td class="v-align-middle semi-bold">
                <a href="{{ route('customer.bookings.track', [auth()->user()->username, $pickup->tracking_number]) }}" class="btn btn-rounded btn-sm btn-outline-primary">{{ $pickup->tracking_number }}</a>
              </td>
              <td class="v-align-middle semi-bold">
                <a href="{{ route('customer.bookings.track', [auth()->user()->username, $pickup->tracking_number]) }}">
                <span class="btn btn-primary m-1">{{ $pickup->pickupActivities->first()->deliveryStatus->name }}</span>
                </a>
              </td>
               <td class="v-align-middle semi-bold">
                <p>{{ $pickup->package->name }}</p>
              </td>
               @if ($pickup->package->name == 'Own Packaging')
                <td class="v-align-middle semi-bold">
                <p>{{ $pickup->priceFormatted($pickup->package_amount) }}</p>
                </td>
              @else
                <td class="v-align-middle semi-bold">
                <p>{{ $pickup->priceFormatted($pickup->package->amount) }}</p>
                </td>
              @endif
              <td class="v-align-middle semi-bold">
                <div class="btn-group">
                <a href="{{ route('customer.bookings.waybill', [auth()->user()->username, $pickup->id]) }}" class="btn btn-outline-primary m-1">Download Waybill</a>
                </div>
              </td>
            </tr>
            @include('customers.bookings.modals')
            @endforeach
          </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection

@section('lower-links-extends')
  <script src="{{ asset('pages/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('pages/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
  <script type="text/javascript" src="{{ asset('pages/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/datatables.js') }}" type="text/javascript"></script>
@endsection
