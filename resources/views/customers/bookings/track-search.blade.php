@extends('layouts.pages.app')

@section('title', 'Pickups Schedules')

@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" media="screen" />
@endsection

@section('content')

<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
        <div class="row">
         <div class="col-md-6">
            <div class="pull-left">
              <h3 class="page-title">{{ __('general.trackDelivery')}}</h3>
            </div>
            </div>
        </div>
    </div>

    @include('layouts.pages.session')
    <div class="container-fixed-lg bg-white">
        <iframe id="myIframe" class="embed-responsive-item" src="/track-delivery" scrolling="yes" title="description" style="min-height: 500px;width:100%; border:none;"></iframe>
    </div>
</div>



@endsection

@section('lower-links-extends-page')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 

    {{-- JS for DatePicker --}}
    <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>
@endsection
