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
                        <h3 class="page-title">Track Parcel</h3>
                    </div>
                </div>
            </div>
        </div>

         <div class="container-fixed-lg bg-white w-100">
            <iframe src="/track-delivery" title="description" style="min-height:650px;width:100%;border:none;">
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
