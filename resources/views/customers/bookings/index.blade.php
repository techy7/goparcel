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
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('customer.bookings', auth()->user()->username) }}">My Pickup Bookings</a></li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">My Bookings</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('customer.pickup', auth()->user()->username) }}">Schedule a Pickup</a>
                    </div>
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
                        <th>Date Pickup Scheduled</th>
                        <th>Recipient Name</th>
                        <th>Tracking Number</th>
                        <th>Package Type</th>
                        <th>Pickup Date</th>
                        <th>Package Type</th>
                        <th>Total Amount</th>
                        <th>Delivery Status</th>
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
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $pickup->tracking_number }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $pickup->package->name }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $pickup->pickup_date->format('F d, Y (D)') }}</p>
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
                                <p>
                                  <a href="{{ route('customer.bookings.track', [auth()->user()->username, $pickup->tracking_number]) }}">
                                    <span class="btn btn-primary">{{ dd($pickup->pickupActivities->name) }}</span>
                                  </a>
                                </p>
                            </td>
                            <td class="v-align-middle semi-bold">
                              <div class="btn-group">
                                <a href="{{ route('customer.bookings.waybill', [auth()->user()->username, $pickup->id]) }}" class="btn btn-outline-primary m-1">Waybill</a>
                                {{-- <div class="btn-group dropdown dropdown-default" style="margin-top: 4px">
                                  <button aria-label="" class="btn dropdown-toggle text-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Details
                                  </button>
                                  <div class="dropdown-menu">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#modalSlideUp-{{ $pickup->id }}">
                                      Package
                                    </button>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#modalSlideUp-{{ $pickup->id }}-{{ $pickup->id }}">
                                      Receiver
                                    </button>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#modalSlideUp-{{ $pickup->id }}-{{ $pickup->id }}-{{ $pickup->id }}">
                                      Pickup
                                    </button>
                                  </div>
                                </div> --}}
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