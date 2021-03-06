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
              <h3 class="page-title">{{ __('general.pickup_schedules')}}</h3>
          </div>
        </div>
      </div>
    </div>

    @include('layouts.pages.session')
    <div class="container-fixed-lg bg-white">
      <div class="card card-transparent">
          <div class="card-header ">
            {{-- <div class="row">

                <div class="col-md-12">
                  <div class="pull-right">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                  </div>
                </div>
            </div> --}}
              {{-- <div class="pull-right">
                <div class="col-xs-12">
                  <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                </div>
              </div> --}}
            <div class="clearfix"></div>
          </div>
        <div class="card-body">
          
          {{-- <div id="placeHolder"></div> <br/> --}}
          {{-- <ul id="container">
            @foreach ($pickups as $pickup)
                  <li data-city="{{ $pickup->pickup_city }}" data-state="{{ $pickup->pickup_state }}" data-postalCode="{{ $pickup->pickup_postal_code }}"> {{ $pickup->pickup_city }} || {{ $pickup->pickup_state }} || {{ $pickup->pickup_postal_code }} </li>

            @endforeach
          </ul> --}}

      
        <div class="p-0 mb-3">
          <a class="btn" data-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
            Show/Hide Filter 
          </a>
        </div>
   


        <div class="table-responsive mt-3">
            <table class="table table-hover demo-table-search table-responsive-block" id="pickup_table">
              <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>Tracking Number</th>
                  <th>Pickup Address</th>
                  <th>Pickup City</th>
                  <th>Pickup State</th>
                  <th>Pickup Postal Code</th>
                  <th>Package Type</th>
                  <th>Total Amount</th>
                  <th>Delivery Date</th>
                  <th>Pickup Date Scheduled</th>
                  <th>Delivery Status</th>
                  <th>Action</th>
                </tr>
                
              </thead>
              <tbody id="container">
                  @foreach ($pickups as $pickup)
                  <tr data-city="{{ $pickup->pickup_city }}" data-state="{{ $pickup->pickup_state }}" data-postal-code="{{ $pickup->pickup_postal_code }}" data-package-type="{{ $pickup->package->name }}" data-delivery-status="{{ $pickup->pickupActivities->first()->deliveryStatus->name }}">
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
                          <p>{{ $pickup->pickup_city }}</p>
                      </td>
                      <td class="v-align-middle semi-bold">
                          <p>{{ $pickup->pickup_state }}</p>
                      </td>
                      <td class="v-align-middle semi-bold">
                          <p>{{ $pickup->pickup_postal_code }}</p>
                      </td>
                      <td class="v-align-middle semi-bold">
                          <p>{{ $pickup->name }}</p>
                      </td>
                      @if ($pickup->name == 'Own Packaging')
                        <td class="v-align-middle semi-bold">
                          <p>{{ $pickup->priceFormatted($pickup->package_amount) }}</p>
                        </td>
                      @else
                        <td class="v-align-middle semi-bold">
                          <p>{{ $pickup->priceFormatted($pickup->amount) }}</p>
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
                            <a href="{{ route('admin.pickups.destroy-confirmation', $pickup->id) }}" class="btn btn-outline-danger text-danger m-1">Delete</a>
                          </div>
                      </td>
                      @include('admin.pickups.modals')
                    @endforeach
                  </tr>
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
    {{-- Additional JS for datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"> </script>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">  </script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"> </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"> </script>
    <script type="text/javascript" src=" https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"> </script>
@endsection


@section('lower-links-extends-page')
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  --}}
    <script src="{{ asset('pages/assets/js/tables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/datatables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/demo.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/Custom/bootstrap-tagsinput.js') }}"></script>
    
    {{-- JS for DatePicker --}}
    <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>

    <script type="text/javascript">
     $(document).ready(function() {
        // Setup - add a text input to each footer cell
        /*$('#example thead tr').clone(true).appendTo( '#example thead' );
        $('#example thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );*/

        
      } );
    </script>

  <script>
    $(document).ready(function(){

       $('#pickup_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {   
              extend: 'excel', 
              text: 'Download Excel' ,                
              exportOptions: {
                columns: 'th:not(:last-child)'
              }
            },
            {   
              extend: 'pdfHtml5',
              text: 'Download PDF',
              orientation: 'landscape',
              pageSize: 'LEGAL' ,
              exportOptions: {
                  columns: 'th:not(:last-child)'
                }
            }
        ],
        "pageLength": 15
    } );
     @if(!empty($searches))
        var s = {!! json_encode($searches) !!};
        $('#displayCity').tagsinput('add', s["cities"].join());
        $('#displayState').tagsinput('add', s["states"].join());
        $('#displayPostalCode').tagsinput('add', s["postalCodes"].join());
        $('#displayPackageType').tagsinput('add', s["packageTypes"].join());
        $('#datepicker-from').val(s['fromDate']);
        $('#datepicker-to').val(s['toDate']);
     @endif  


      $("#input-city").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdown-city li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

       $("#input-state").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdown-state li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });


       $("#input-postal-code").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdown-postal-code li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#input-package-type").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdown-package-type li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

    });

    $(function() {
      $('ul#dropdown-city li').click( function() {
      $('#displayCity').tagsinput('add', $(this).attr('data-value'));
      });
    });


    $(function() {
      $('ul#dropdown-state li').click( function() {
      $('#displayState').tagsinput('add', $(this).attr('data-value'));
      });
    });

    $(function() {
      $('ul#dropdown-postal-code li').click( function() {
      $('#displayPostalCode').tagsinput('add', $(this).attr('data-value'));
      });
    });

     $(function() {
      $('ul#dropdown-package-type li').click( function() {
      $('#displayPackageType').tagsinput('add', $(this).attr('data-value'));
      });
    });


     $(function(){
        $('.datepicker-standard').datepicker({
          format: "dd-M-yyyy",
          forceParse: true,
          clearBtn: true,
          todayHighlight: true,
         // startDate: '+1d'
        });
    });


  
    
   

</script>

    
@endsection

