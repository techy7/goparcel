@extends('layouts.pages.app')

@section('title', __('general.dashboard'))

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
                  <h2 class="page-title">{{ __('general.dashboard') }}</h2>
              </div>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4 m-b-10">
        <div class="widget-9 card bg-color-1 no-margin">
          <div class="full-height d-flex flex-column">
            <div class="card-header">
              <div class="card-title">
                <span class="font-montserrat fs-11 all-caps">{{ __('general.total_number_of_pickups') }}</span>
              </div>
            </div>
            <div class="p-l-20">
              <h3 class="no-margin p-b-5">{{ $numberPickups }}</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 m-b-10">
        <div class="widget-9 card bg-color-2 no-margin">
          <div class="full-height d-flex flex-column">
            <div class="card-header">
              <div class="card-title">
                <span class="font-montserrat fs-11 all-caps">{{ __('general.total_number_of_customers') }}</span>
              </div>
            </div>
            <div class="p-l-20">
              <h3 class="no-margin p-b-5">{{ $numberCustomers }}</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 m-b-10">
        <div class="widget-9 card bg-color-3 no-margin">
          <div class="full-height d-flex flex-column">
            <div class="card-header ">
              <div class="card-title">
                <span class="font-montserrat fs-11 all-caps">{{ __('general.total_number_of_staff') }}</span>
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
      <div class="col-lg-8 m-b-10">
        <div class="widget-11-2 card no-margin widget-loader-circle full-height d-flex flex-column">
          <div class="card-header separator">
            <div class="card-title">{{ __('general.for_todays_pickup_list') }}</div>
          </div>
          <div class="widget-11-table auto-overflow">
            <table class="table table-condensed table-hover">
              <tbody>
                @forelse ($newRequests as $request)
                <tr>
                  <td class="b-r b-dashed b-grey">{{ $request->user->name }}</td>
                  <td class="text-right b-r b-dashed b-grey">
                    <span class="hint-text small">{{ $request->package->name }}</span>
                  </td>
                  <td class="">
                    <span class="">₱{{ number_format($request->package_amount,2) }}</span>
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
