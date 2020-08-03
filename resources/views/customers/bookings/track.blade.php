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
                                            <div class="card-body" style="margin-bottom: -45px;">
                                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                {{-- @foreach ($pickupStatus as $key => $status)
                                                    <div class="step 
                                                        @if($pickupActive->status == 'Order Created')
                                                            @if($status->status == $pickupActive->status) completed @endif
                                                        @endif
                                                        @if($pickupActive->status == 'In Transit for Collection')
                                                            @if($pickupOrder->pickup_activity_id > 0)
                                                                @if($status->status == $pickupActive->status) completed @endif
                                                            @endif
                                                        @endif
                                                        ">
                                                        <div class="step-icon-wrap">
                                                            <div class="step-icon"><i class="
                                                                @if($status->status == 'Order Created') pe-7s-note 
                                                                @elseif($status->status == 'In Transit for Collection') pe-7s-albums 
                                                                @elseif($status->status == 'Arrived at Manila Hub') pe-7s-map-marker 
                                                                @elseif($status->status == 'In Transit for Delivery') pe-7s-car 
                                                                @elseif($status->status == 'Delivered') pe-7s-box2 
                                                                @elseif($status->status == 'Back to Sender') pe-7s-back-2
                                                                @endif
                                                            "></i></div>
                                                        </div>
                                                        <h4 class="step-title">{{ $status->status }}</h4>
                                                        <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $pickupOrder->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                    </div>
                                                @endforeach --}}
                                                
                                                @if(($pickupActive->status == 'Order Created') || ($pickupActive->status == 'In Transit for Collection') || ($pickupActive->status == 'Arrived at Manila Hub') || ($pickupActive->status == 'In Transit for Delivery') || ($pickupActive->status == 'Delivered') || ($pickupActive->status == 'Back to Sender'))
                                                <div class="step completed">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon"><i class="pe-7s-note"></i></div>
                                                    </div>
                                                    <h4 class="step-title">Order Created</h4>
                                                    <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $pickupActive->pivot->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                </div>
                                                <div class="step @if(($pickupActive->status == 'In Transit for Collection') || ($pickupActive->status == 'Arrived at Manila Hub') || ($pickupActive->status == 'In Transit for Delivery') || ($pickupActive->status == 'Delivered') || ($pickupActive->status == 'Back to Sender')) completed @endif">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon"><i class="pe-7s-albums"></i></div>
                                                    </div>
                                                    <h4 class="step-title">In Transit for Collection</h4>
                                                    <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $pickupActive->pivot->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                </div>
                                                <div class="step @if(($pickupActive->status == 'Arrived at Manila Hub') || ($pickupActive->status == 'In Transit for Delivery') || ($pickupActive->status == 'Delivered') || ($pickupActive->status == 'Back to Sender')) completed @endif">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon"><i class="pe-7s-map-marker"></i></div>
                                                    </div>
                                                    <h4 class="step-title">Arrived at Manila Hub</h4>
                                                    <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $pickupActive->pivot->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                </div>
                                                <div class="step @if(($pickupActive->status == 'In Transit for Delivery') || ($pickupActive->status == 'Delivered') || ($pickupActive->status == 'Back to Sender')) completed @endif">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon"><i class="pe-7s-car"></i></div>
                                                    </div>
                                                    <h4 class="step-title">In Transit for Delivery</h4>
                                                </div>
                                                <div class="step @if(($pickupActive->status == 'Delivered') || ($pickupActive->status == 'Back to Sender')) completed @endif">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon"><i class="pe-7s-box2"></i></div>
                                                    </div>
                                                    <h4 class="step-title">Delivered</h4>
                                                </div>
                                                <div class="step @if($pickupActive->status == 'Back to Sender') completed @endif">
                                                    <div class="step-icon-wrap">
                                                        <div class="step-icon"><i class="pe-7s-back-2"></i></div>
                                                    </div>
                                                    <h4 class="step-title">Back to Sender</h4>
                                                </div>
                                                @endif
                                            </div>
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