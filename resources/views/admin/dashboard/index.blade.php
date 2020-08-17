@extends('layouts.pages.app')

@section('title', 'Dashboard')

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
            <div class="col-md-6">
                <div class="pull-left">
                    <h3 class="page-title">Dashboard</h3>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
            <div class="col-md-4 m-b-10">
              <div class="widget-9 card  bg-success no-margin widget-loader-bar">
                <div class="full-height d-flex flex-column">
                  <div class="card-header ">
                    <div class="card-title">
                      <span class="font-montserrat fs-11 all-caps">No. of Pickups </span>
                    </div>
                  </div>
                  <div class="p-l-20">
                    <h3 class="no-margin p-b-5">{{ $numberPickups }}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 m-b-10">
              <div class="widget-9 card  bg-primary no-margin widget-loader-bar">
                <div class="full-height d-flex flex-column">
                  <div class="card-header ">
                    <div class="card-title">
                      <span class="font-montserrat fs-11 all-caps">No. of Customers </span>
                    </div>
                  </div>
                  <div class="p-l-20">
                    <h3 class="no-margin p-b-5">{{ $numberCustomers }}</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 m-b-10">
              <div class="widget-9 card  bg-danger no-margin widget-loader-bar">
                <div class="full-height d-flex flex-column">
                  <div class="card-header ">
                    <div class="card-title">
                      <span class="font-montserrat fs-11 all-caps">No. of Staffs </span>
                    </div>
                  </div>
                  <div class="p-l-20">
                    <h3 class="no-margin p-b-5">{{ $numberStaffs }}</h3>
                  </div>
                </div>
              </div>
        </div>
      </div>
      
      <div class="row">
        <!--
        <div class="col-lg-8 m-b-10">
          <div class="card card-transparent">
            <h3 class="pull-left m-t-5 m-b-5 page-title">Pickups List</h3>
            <div class="card-header ">
              <div class="row">
                  <div class="col-md-6">
                      <div class="pull-left">
                              <div class="dropdown">
                                <button aria-label="" class="btn text-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Filter by <i class="pg-icon">filter</i>
                                </button>
                                  <div class="dropdown-menu" role="menu">
                                      <a href="{{ route('admin.pickups') }}" class="dropdown-item">All</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.pickups') }}" class="dropdown-item">Date</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.pickups.new-request') }}" class="dropdown-item">New Request</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.pickups') }}" class="dropdown-item">Client</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('admin.pickups') }}" class="dropdown-item">Location</a>
                                  </div>
                              </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="pull-right">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                      </div>
                  </div>
              </div>
              <div class="clearfix"></div>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Tracking Number</th>
                    <th>Pickup Address</th>
                    <th>Package Type</th>
                    <th>Total Amount</th>
                    <th>Delivery Date</th>
                    <th>Pickup Date Scheduled</th>
                    <th>Delivery Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pickups as $pickup)
                    <tr>
                        <td class="v-align-middle semi-bold">
                            <p>{{ $pickup->user->name }}</p>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <a href="{{ route('customer.bookings.track', [auth()->user()->username, $pickup->tracking_number]) }}" class="btn btn-rounded btn-sm btn-outline-primary">{{ $pickup->tracking_number }}</a>
                        </td>
                        <td class="v-align-middle semi-bold">
                            <p>{{ $pickup->pickup_address }}</p>
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
                          <p>{{ $pickup->pickup_date->format('F d, Y (D)') }}</p>
                        </td>
                        <td class="v-align-middle semi-bold">
                            <p>{{ $pickup->created_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <a href="{{ route('customer.bookings.track', [auth()->user()->username, $pickup->tracking_number]) }}" class="btn btn-rounded btn-sm btn-outline-primary">
                            {{ $pickup->pickupActivities->first()->deliveryStatus->name }}
                          </a>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <div class="btn-group">
                            <div class="btn-group dropdown dropdown-default m-1" style="margin-top: 4px;">
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
                                  Customer
                                </button>
                              </div>
                            </div>
                              <a href="{{ route('admin.pickups.edit', $pickup->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                              <a href="{{ route('admin.pickups.destroy-confirmation', $pickup->id) }}" class="btn btn-outline-danger m-1">Delete</a>
                            </div>
                        </td>
                    </tr>
                    @include('admin.pickups.modals')
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>
        -->
        <div class="col-lg-6 col-xl-4 m-b-10 hidden-xlg">
          <div class="widget-11-2 card  no-margin widget-loader-circle full-height d-flex flex-column">
            <div class="card-header">
              <div class="card-title">Today's Pickups List
              </div>
            </div>
            <div class="widget-11-table auto-overflow">
              <table class="table table-condensed table-hover">
                <tbody>
                  @forelse ($newRequests as $request)
                  <tr>
                        <td class="fs-12 ">{{ $request->user->name }}</td>
                        <td class="text-right b-r b-dashed b-grey ">
                          <span class="hint-text small">{{ $request->package->name }}</span>
                        </td>
                        <td class="">
                          <span class="font-montserrat fs-18">₱{{ number_format($request->package_amount,2) }}</span>
                        </td>
                      </tr>
                  @empty
                    <tr>
                      <td>No current pickup list found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
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
    <script src="{{ asset('pages/assets/js/demo.js') }}" type="text/javascript"></script>
@endsection