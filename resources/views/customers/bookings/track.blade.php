@extends('layouts.pages.app')

@section('title', 'Order Details')

@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('customer.bookings', auth()->user()->username) }}">Order</a></li>
              <li class="breadcrumb-item active">Tracking #: {{ $pickupOrder->tracking_number }}</li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">Order Details</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('customer.pickup', auth()->user()->username) }}">Schedule Another Delivery</a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.pages.session')

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-header  separator">
                    <div class="card-title">
                        <h5 style="margin-bottom: 0px !important">Tracking #: {{ $pickupOrder->tracking_number }}</h5>
                        <p><small>Date Pickup Scheduled: {{ $pickupOrder->created_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</small></p>
                    </div>
                    </div>
                    <div class="card-body" style="padding-bottom: 0px !important">
                        <div class="row m-t-20">
                            <div class="col-6">
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important">
                                        <h5 class="address-title text-muted">Sender Address</h5>
                                        <h5 class="no-margin"><strong>Sender Name | Phone Number | Date Pickup Scheduled</strong></h5>
                                        <p>Address City Postal Code</p>
                                    </div>
                                </div>
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important">
                                        <h5 class="address-title text-muted">Recipient Address</h5>
                                        <h5 class="no-margin"><strong>Recipient Name | Phone Number | Email</strong></h5>
                                        <p>Address City Postal Code</p>
                                    </div>
                                </div>
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important">
                                        <h5 class="address-title text-muted">Order Summary</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="pull-left">
                                                    <h5 class="no-margin"><strong>Large Packaging</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <p><strong>₱88.00</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important; padding-bottom: 15px !important;">
                                        <h5 class="address-title text-muted">Fess and Breakdown</h5>
                                        <div class="row m-t-10">
                                            <div class="col-md-6">
                                                <div class="pull-left">
                                                <h5 class="no-margin small"><strong>Service Fees</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                <h5 class="no-margin small"><strong>₱0.00</strong></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-b-5">
                                            <div class="col-md-6">
                                                <div class="pull-left m-l-10">
                                                <h5 class="no-margin small text-muted">Additional Weight Fee</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                <h5 class="no-margin small text-muted">₱88.00</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-md-6">
                                                <div class="pull-left">
                                                <h5 class="no-margin small"><strong>Total Amount</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                <h5 class="no-margin small"><strong>P88.00</strong></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row m-t-10">
                                            <div class="col-12 text-center">
                                                <a href="{{ route('customer.pickup', auth()->user()->username) }}">Schedule Another Delivery</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="padding-top: 0px !important">
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important;">
                                        <h5 class="address-title text-muted">Tracking Details</h5>
                                            <div class="card-body" style="padding: 10px 20px 0px 10px !important;">
                                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                @foreach ($pickupOrder->pickupActivities as $key => $active)
                                                    <div class="step 
                                                            @if(($active->deliveryStatus->name == 'Order Created') || ($active->deliveryStatus->name == 'In Transit for Collection') || ($active->deliveryStatus->name == 'Arrived at Manila Hub') || ($active->deliveryStatus->name == 'In Transit for Delivery')) completed @endif
                                                        ">
                                                        <div class="step-icon-wrap">
                                                            <div class="step-icon"><i class="
                                                                @if($active->deliveryStatus->name == 'Order Created') pe-7s-note 
                                                                @elseif($active->deliveryStatus->name == 'In Transit for Collection') pe-7s-albums 
                                                                @elseif($active->deliveryStatus->name == 'Arrived at Manila Hub') pe-7s-map-marker 
                                                                @elseif($active->deliveryStatus->name == 'In Transit for Delivery') pe-7s-car 
                                                                @elseif($active->deliveryStatus->name == 'Delivered') pe-7s-box2 
                                                                @elseif($active->deliveryStatus->name == 'Back to Sender') pe-7s-back-2
                                                                @endif
                                                            "></i></div>
                                                        </div>
                                                        <h4 class="step-title">{{ $active->deliveryStatus->name }}</h4>
                                                        <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $active->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center m-b-10">
                                            <div class="custom-control custom-checkbox">
                                            <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails">Download Waybill</a></div>
                                            </div>
                                            <div class="text-left text-sm-right m-r-20"><a class="btn btn-outline-primary btn-rounded btn-sm" href="orderDetails">Share Tracking</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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



{{-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}