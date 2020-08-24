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
                @if (auth()->user()->hasRole('Customer'))
                    <li class="breadcrumb-item active"><a href="{{ route('customer.bookings', auth()->user()->username) }}">Order</a></li>
                @else
                    <li class="breadcrumb-item active"><a href="{{ route('admin.pickups') }}">Pickup Schedules</a></li>
                @endif
              <li class="breadcrumb-item active">Tracking #: {{ $pickupOrder->tracking_number }}</li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">Order Details</h3>
                    </div>
                </div>
                @hasanyrole('Customer')
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('customer.pickup', auth()->user()->username) }}">Schedule Another Delivery</a>
                    </div>
                </div>
                @endhasanyrole
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
                                        <h5 class="no-margin"><strong>{{ $pickupOrder->user->name }} | {{ $pickupOrder->user->m_number }} | {{ $pickupOrder->pickup_date->format('F d, Y (D)') }}</strong></h5>
                                        <p>{{ $pickupOrder->pickup_address }} {{ $pickupOrder->pickup_city }} {{ $pickupOrder->pickup_postal_code }}</p>
                                    </div>
                                </div>
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important">
                                        <h5 class="address-title text-muted">Recipient Address</h5>
                                        <h5 class="no-margin"><strong>{{ $pickupOrder->receiver_name }} | {{ $pickupOrder->receiver_phone }} | {{ $pickupOrder->receiver_email }}</strong></h5>
                                        <p>{{ $pickupOrder->receiver_address }} {{ $pickupOrder->receiver_city }} {{ $pickupOrder->receiver_postal_code }}</p>
                                    </div>
                                </div>
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body" style="padding: 8px !important">
                                        <h5 class="address-title text-muted">Order Summary</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="pull-left">
                                                    <h5 class="no-margin"><strong>{{ $pickupOrder->package->name }} Packaging</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <p><strong>₱{{ $pickupOrder->package->amount }}.00</strong></p>
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
                                                <h5 class="no-margin small"><strong>₱{{ $pickupOrder->package->amount }}.00</strong></h5>
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
                                                    @if ($pickupOrder->package_length == 0 && $pickupOrder->package_width == 0 && $pickupOrder->package_height == 0)
                                                    <h5 class="no-margin small text-muted">₱0</h5>
                                                    @else
                                                    <h5 class="no-margin small text-muted">₱{{ abs($pickupOrder->package_amount - $pickupOrder->package->amount) }}</h5>
                                                    @endif
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
                                                <h5 class="no-margin small"><strong>₱{{ number_format($pickupOrder->package_amount, 2, '.', ',') }}</strong></h5>
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="pull-left">
                                                    <h5 class="address-title text-muted">Tracking Details</h5>
                                                </div>
                                            </div>
                                            @hasanyrole('Super Admin')
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                    <a href="{{ route('admin.pickups.edit', $pickupOrder->id) }}">Update Delivery Status</a>
                                                </div>
                                            </div>
                                            @endhasanyrole
                                        </div>
                                            <div class="card-body" style="padding: 10px 20px 0px 10px !important;">
                                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                
                                                {{-- @foreach ($pickupOrder->pickupActivities->sortBy('created_at') as $key => $active)
                                                    <div class="step 
                                                            @if(($active->deliveryStatus->name == 'Order Created') || ($active->deliveryStatus->name == 'In Transit for Collection') || ($active->deliveryStatus->name == 'Arrived at Manila Hub') || ($active->deliveryStatus->name == 'In Transit for Delivery') || ($active->deliveryStatus->name == 'Delivered') || ($active->deliveryStatus->name == 'Back to Sender')) completed @endif
                                                        ">
                                                        {{$key}}
                                                        <div class="step-icon-wrap">
                                                            <div class="step-icon" style="{{$key>1 ? 'background: red' : 'background: blue'}}"><i class="
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
                                                @endforeach --}}

                                                 @foreach ($statuses as $key => $status)
                                                    <div class="step" style="color: red">
                                                        <div class="step-icon-wrap">
                                                            <div class="step-icon" style="{{$key< $count ? 'background: #0b6181; color: white;' : ''}}"><i class="
                                                                @if($status->name == 'Order Created') pe-7s-note 
                                                                @elseif($status->name == 'In Transit for Collection') pe-7s-albums 
                                                                @elseif($status->name == 'Arrived at Manila Hub') pe-7s-map-marker 
                                                                @elseif($status->name == 'In Transit for Delivery') pe-7s-car 
                                                                @elseif($status->name == 'Delivered') pe-7s-box2 
                                                                @elseif($status->name == 'Back to Sender') pe-7s-back-2
                                                                @endif
                                                            "></i></div>
                                                        </div>
                                                        <h4 class="step-title">{{ $status->name }}</h4>
                                                        @if($key< $count )
                                                            <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $status->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                        @endif
                                                    </div>
                                                @endforeach 
                                          

                                            </div>
                                        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center m-b-10">
                                            <div class="custom-control custom-checkbox">
                                            <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="{{ route('customer.bookings.waybill', [auth()->user()->username, $pickupOrder->id]) }}">Download Waybill</a></div>
                                            </div>
                                            <div class="text-left text-sm-right m-r-20">
                                                <a class="btn btn-outline-primary btn-rounded btn-sm" onmouseout="outFunc()" data-clipboard-text="https://app.weparcelbear.com/track-delivery/{{ $pickupOrder->tracking_number }}">Share Tracking</a>
                                                <span class="tooltiptext" id="myTooltip"></span>
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
  </div>
@endsection

@section('lower-links-extends')
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>
    <script>
        var clipboard = new ClipboardJS('.btn');
            clipboard.on('success', function(e) {
                var tooltip = document.getElementById("myTooltip");
                tooltip.innerHTML = "<small><strong>Copied!</strong></small>";
        });
        function outFunc() {
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "";
        }
    </script>
@endsection
@section('lower-links-extends-page')
    <script src="{{ asset('pages/assets/js/datatables.js') }}" type="text/javascript"></script>
@endsection



{{-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}