@extends('layouts.pages.app')

@section('title', __('general.track_delivery'))

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
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">{{ __('general.track_delivery')}}</h3>
                    </div>
                </div>
            </div>
        </div> 

         <div class="container-fixed-lg bg-white w-100 py-3">
             @if(Session::has('message'))
                        <div class="container"> 
                            <div class="alert alert-error" role="alert">
                                {{ Session::get('message') }}
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('booking.track-delivery.show', auth()->user()->username) }}" method="get"  data-parsley-validate autocomplete="off" class="d-print-none mb-5" >
                            <div class="col-xs-12 col-sm-12 col-md-12 col-12 d-flex justify-content-center mt-4">
                                <div class="form-group form-group-default col-md-4 col-sm-12">
                                    <label>{{ __('general.tracking_code')}}</label>
                                    <input type="text" class="form-control" name="tracking_number" value=""  placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.tracking_code'))]) }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-12 text-center mt-4">
                                <button type="submit" class="btn btn-block btn-lg btn-rounded btn-primary p-3 col-md-4 col-sm-12">{{ __('general.search')}}</button>
                            </div>
                        </form>
                        @if(request()->has('tracking_number'))
                        <div class="container">
                            <div class="row">
                                <p><strong>{{ __('general.tracking_code')}}: </strong> {{$pickupOrder->tracking_number}}<br/>
                                <strong>{{ __('general.delivery_status')}}:</strong>  {{$pickupOrder->pickupActivities->first()->deliveryStatus->name}}</p>

                            </div><br/>
                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                                @foreach ($statuses as $key => $status)
                                    <div class="step" style="color: red">
                                        <div class="step-icon-wrap">
                                        <div class="step-icon" style="{{!is_null($status->pickup_id) ? 'background: #0b6181; color: white;' : ''}}"><i class="{{$status->icon}}"></i></div>
                                        </div>
                                        <h4 class="step-title">{{ $status->name }}</h4>
                                        @if(!is_null($status->pickup_id))
                                            <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $status->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                         </div>   
                        @endif
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
