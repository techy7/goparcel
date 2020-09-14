@extends('layouts.pages.app')

@section('title', __('general.order_details'))

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
                    <li class="breadcrumb-item active"><a href="{{ route('customer.bookings', auth()->user()->username) }}">{{ __('general.my_pickup_bookings')}}</a></li>
                @else
                    <li class="breadcrumb-item active"><a href="{{ route('admin.pickups') }}">{{ __('general.pickup_schedules')}}</a></li>
                @endif
              <li class="breadcrumb-item active">{{ __('general.tracking_code')}}: {{ $pickupOrder->tracking_number }}</li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">{{ __('general.order_details')}}</h3>
                    </div>
                </div>
                @hasanyrole('Customer')
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('customer.pickup', auth()->user()->username) }}">{{ __('general.schedule_another')}}</a>
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
                        <h5 style="margin-bottom: 0px !important">{{ __('general.tracking_code')}}: {{ $pickupOrder->tracking_number }}</h5>
                        <p><small>{{ __('general.order_created')}}: {{ $pickupOrder->created_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</small><br/>
                     <small>{{ __('general.pickup_schedule')}}: {{ $pickupOrder->pickup_date->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D)') }}</small></p>
                    </div>
                    </div>
                    <div class="card-body p-3" style="padding-bottom: 0px !important">
                        <div class="row m-t-20">
                            <div class="col-6">
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body p-3" >
                                        <h5 class="address-title text-muted">{{ __('pickup.pickup_address')}}</h5>
                                        <p><strong>{{ $pickupOrder->user->name }}</strong></p>
                                        <p class="mb-0">{{ $pickupOrder->user->m_number }}</p>
                                        <p class="mb-0">{{ $pickupOrder->pickup_date->format('F d, Y (D)') }}</p>
                                        <p class="mb-0">{{ $pickupOrder->pickup_address }}</p>
                                        <p class="mb-0">{{ $pickupOrder->pickup_city }}</p>
                                        <p class="mb-0">{{ $pickupOrder->pickup_postal_code }}</p>
                                    </div>
                                </div>
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body p-3">
                                        <h5 class="address-title text-muted">{{ __('general.order_summary')}}</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="pull-left">
                                                    <p class="no-margin">{{ __('pickup.package_type')}}: {{ $pickupOrder->package->name }}<p>
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
                                    <div class="card-body p-3">
                                        <h5 class="address-title text-muted">{{ __('pickup.receiver_address')}}</h5>
                                        <p><strong>{{ $pickupOrder->receiver_name }}</strong></p>
                                        <p class="mb-0">{{ $pickupOrder->receiver_phone }}</p>
                                        <p class="mb-0">{{ $pickupOrder->receiver_email }}</p>
                                        <p class="mb-0">{{ $pickupOrder->receiver_address }}</p>
                                        <p class="mb-0" class="mb-0">{{ $pickupOrder->receiver_city }}</p>
                                        <p class="mb-0">{{ $pickupOrder->receiver_postal_code }}</p>
                                    </div>
                                </div>
                                <div class="card card-default" style="border: 1px solid #ccc">
                                    <div class="card-body p-3">
                                        <h5 class="address-title text-muted">{{ __('pickup.fees_breakdown')}}</h5>
                                        <div class="row m-t-10">
                                            <div class="col-md-6">
                                                <div class="pull-left">
                                                <h5 class="no-margin small"><strong>{{ __('pickup.service_fee')}}</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                <h5 class="no-margin small"><strong>{{ $pickupOrder->priceFormatted($pickupOrder->package->amount) }}</strong></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-b-5">
                                            <div class="col-md-6">
                                                <h5 class="no-margin small"><strong>{{ __('pickup.additional_fee')}}</strong></h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                    <h5 class="no-margin small"><strong>{{ $pickupOrder->priceFormatted($pickupOrder->additional_fee) }}</strong></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row p-b-5">
                                            <div class="col-md-6">
                                                <h5 class="no-margin small"><strong>{{ __('pickup.item_fee')}}</strong></h5>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                    <h5 class="no-margin small"><strong>{{ $pickupOrder->priceFormatted($pickupOrder->item_amount) }}</strong></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="m-1">
                                        <div class="row m-t-10">
                                            <div class="col-md-6">
                                                <div class="pull-left">
                                                <h5 class="no-margin small"><strong>{{ __('pickup.total_amount')}}</strong></h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                <h5 class="no-margin small"><strong>{{ $pickupOrder->priceFormatted($pickupOrder->package_amount ) }}</strong></h5>
                                                </div>
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
                                                    <h5 class="address-title text-muted">{{ __('pickup.tracking_details')}}</h5>
                                                </div>
                                            </div>
                                            @hasanyrole('Super Admin')
                                            <div class="col-md-6">
                                                <div class="pull-right">
                                                    <a href="{{ route('admin.pickups.edit', $pickupOrder->id) }}">{{ __('pickup.edit_pickup')}}</a>
                                                </div>
                                            </div>
                                            @endhasanyrole
                                        </div>
                                            <div class="card-body" style="padding: 10px 20px 0px 10px !important;">
                                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                                 @foreach ($statuses as $key => $status)
                                                    <div class="step" style="color: red">
                                                        <div class="step-icon-wrap">
                                                            <div class="step-icon" style="{{!is_null($status->pickup_id) ? ($status->status_id ==7) ? 'background: red; color:white' : 'background: #0b6181; color: white;' : ''}}"><i class="{{$status->icon}}"></i></div>
                                                        </div>
                                                        <h4 class="step-title">{{ $status->name }}</h4>
                                                        @if(!is_null($status->pickup_id))
                                                            <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $status->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                                        @endif
                                                    </div>
                                                @endforeach


                                            </div>
                                        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center justify-content-sm-between align-items-center m-b-10">
                                            <div class="custom-control custom-checkbox">
                                            <div class="text-left text-sm-right"><a class="btn btn-outline-primary btn-rounded btn-sm" href="{{ route('customer.bookings.waybill', [auth()->user()->username, $pickupOrder->id]) }}">{{ __('pickup.download_waybill')}}</a></div>
                                            </div>
                                            <div class="text-left text-sm-right m-r-20">
                                                <a class="btn btn-outline-primary btn-rounded btn-sm" onmouseout="outFunc()" data-clipboard-text="https://app.weparcelbear.com/track-delivery/track?tracking_number={{ $pickupOrder->tracking_number }}">{{ __('pickup.share_tracking')}}</a>
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

