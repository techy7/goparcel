@extends('layouts.pages.app')

@section('title', __('general.pickup_schedules'))

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
            <div class="clearfix"></div>
          </div>
        <div class="card-body">
          <div class="p-0 mb-3">
            <a class="btn" data-toggle="collapse" href="#collapseForm" role="button" aria-expanded="false" aria-controls="collapseForm">
              {{ __('general.show_hide')}}
            </a>
          </div>
        <div class="show bg-light w-100 py-4 px-3 mb-5" id="collapseForm">
          <form action="{{ route('admin.pickup.filter') }}" method="get"  data-parsley-validate autocomplete="off" class="d-print-none" >
            <div class="row">
              <div class="col-md-3">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ __('pickup.pickup_city')}}
                  <span class="caret"></span></button>
                  <ul id="dropdown-city" class="dropdown-menu">
                    <input class="form-control" id="input-city" type="text" placeholder="{{ __('auth.search_field', ['field' => strtolower(__('pickup.pickup_city'))]) }}">
                    @foreach($cities as $city)
                      <li id="{{$city}}" data-value="{{$city}}"><a href="#">{{ $city }}</a></li>
                    @endforeach
                  </ul>
                </div>
                <input id="displayCity" name="displayCity" type="text" value="" data-role="tagsinput"/>
              </div>

              <div class="col-md-3">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ __('pickup.pickup_state')}}
                  <span class="caret"></span></button>
                  <ul id="dropdown-state" class="dropdown-menu">
                    <input class="form-control" id="input-state" type="text" placeholder="{{ __('auth.search_field', ['field' => strtolower(__('pickup.pickup_date'))]) }}">
                    @foreach($states as $state)
                      <li id="{{$state}}" data-value="{{$state}}"><a href="#">{{$state}}</a></li>
                    @endforeach
                  </ul>
                </div>
              <input id="displayState" name="displayState" type="text" value="" data-role="tagsinput"/>
              </div>


              <div class="col-md-3">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ __('pickup.pickup_postal')}}
                  <span class="caret"></span></button>
                  <ul id="dropdown-postal-code" class="dropdown-menu">
                    <input class="form-control" id="input-postal-code" type="text" placeholder="{{ __('auth.search_field', ['field' => strtolower(__('pickup.pickup_postal'))]) }}">
                    @foreach($postal_codes as $postal_code)
                      <li id="{{$postal_code}}" data-value="{{$postal_code}}"><a href="#">{{$postal_code}}</a></li>
                    @endforeach
                  </ul>
                </div>
                <input id="displayPostalCode" name="displayPostalCode" type="text" value="" data-role="tagsinput"/>
              </div>

              <div class="col-md-3">
                <div class="dropdown ">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ __('general.package_type')}}
                  <span class="caret"></span></button>
                  <ul id="dropdown-package-type" class="dropdown-menu">
                    <input class="form-control" id="input-package-type" type="text" placeholder="{{ __('auth.search_field', ['field' => strtolower(__('general.package_type'))]) }}">
                    @foreach($package_types as $package_type)
                      <li id="{{$package_type}}" data-value="{{$package_type}}"><a href="#">{{$package_type}}</a></li>
                    @endforeach
                  </ul>
                </div>
                <input id="displayPackageType" name="displayPackageType" type="text" value="" data-role="tagsinput"/>
              </div>



            </div>{{--End of Row 1--}}
            <div class="row mt-3">
              <div class="col-md-3">
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ __('general.delivery_status')}}
                  <span class="caret"></span></button>
                  <ul id="dropdown-delivery-status" class="dropdown-menu">
                    <input class="form-control" id="input-delivery-status" type="text" placeholder="{{ __('auth.search_field', ['field' => strtolower(__('general.delivery_status'))]) }}">
                    @foreach($deliveryStatus as $status)
                      <li id="{{$status->name}}" data-value="{{$status->name}}"><a href="#">{{$status->name}}</a></li>
                    @endforeach
                  </ul>
                </div>
                <input id="displayDeliveryStatus" name="displayDeliveryStatus" type="text" value="" data-role="tagsinput"/>
              </div>

              <div class="col-md-3">
                <div id="fromDiv">
                  <button class="btn btn-primary " type="button">{{ __('pickup.pickup_date')}}</button>
                  <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                      <label>{{ __('general.from_date')}}</label>
                      <input type="text" name="datepickerFrom" placeholder="{{ __('auth.select_field', ['field' => strtolower(__('general.from_date'))]) }}" data-date-format="dd-M-yyyy" id="datepicker-from" class="form-control datepicker-standard">
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="pg-icon">calendar</i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div id="toDiv">
                <button class="btn btn-primary invisible " type="button"></button>
                  <div class="form-group form-group-default input-group">
                    <div class="form-input-group">
                      <label>{{ __('general.to_date')}}</label>
                      <input type="text" name="datepickerTo" placeholder="{{ __('auth.select_field', ['field' => strtolower(__('general.to_date'))]) }}" data-date-format="dd-M-yyyy" id="datepicker-to" class="form-control datepicker-standard">
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="pg-icon">calendar</i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <button class="btn btn-primary invisible " type="button"></button>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" {{(old('newRequest') == "1") ? 'checked': ''}} id="newRequest" name="newRequest">
                  <label class="form-check-label" for="newRequest">
                    {{ __('general.show_new_request')}}
                  </label>
                </div>
              </div>
            </div>{{--End of Row 2--}}


            {{-- Submit and Clear Filter Button--}}
            <div class="row mt-3 d-flex justify-content-center">
              <div class="col-md-2">
                <a class="btn btn-round clear-filter w-100 mx-2"  href="{{ route('admin.pickups') }}"><i class="fa fa-times mr-2"></i>{{ __('general.clear_search')}}</a>
              </div>
              <div class="col-md-2">
              <button type="submit" class="btn btn-round btn-info w-100 mx-2 "><i class="fa fa-search mr-2"></i>{{ __('general.search')}}</button>
              </div>
            </div>
          </form>
        </div> {{--End of Collapse Form--}}

        <div class="table-responsive mt-3">
            <table class="table table-hover demo-table-search table-responsive-block" id="pickup_table">
              <thead>
                <tr>
                  <th>{{ __('general.pickup_schedule')}}</th>
                  <th>{{ __('general.date_created')}}</th>
                  <th>{{ __('general.customer_name')}}</th>
                  <th>{{ __('general.tracking_code')}}</th>
                  <th>{{ __('pickup.pickup_address')}}</th>
                  <th>{{ __('pickup.pickup_city')}}</th>
                  <th>{{ __('pickup.pickup_state')}}</th>
                  <th>{{ __('pickup.pickup_postal')}}</th>
                  <th>{{ __('pickup.package_type')}}</th>
                  <th>{{ __('pickup.total_amount')}} (₱)</th>
                  <th>{{ __('general.delivery_status')}}</th>
                  <th>{{ __('general.delivery_status')}}</th>
                  <th>{{ __('general.received_by')}}</th>
                  <th>{{ __('general.action')}}</th>
                </tr>

              </thead>
              <tbody id="container">
                  @foreach ($pickups as $pickup)
                  <tr data-city="{{ $pickup->pickup_city }}" data-state="{{ $pickup->pickup_state }}" data-postal-code="{{ $pickup->pickup_postal_code }}" data-package-type="{{ $pickup->package->name }}" data-delivery-status="{{ $pickup->pickupActivities->first()->deliveryStatus->name }}">
                    <td class="v-align-middle semi-bold">
                      <p>{{ $pickup->pickup_date->format('F d, Y (D)') }}</p>
                    </td>
                    <td class="v-align-middle semi-bold">
                      <p>{{ $pickup->created_at->format('F d, Y h:m A') }}</p>
                    </td>
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
                          <p>{{ $pickup->package->name }}</p>
                      </td>
                      @if ($pickup->name == 'Own Packaging')
                        <td class="v-align-middle semi-bold">
                          <p> {{number_format($pickup->package_amount ,'2') }}</p>
                        </td>
                      @else
                        <td class="v-align-middle semi-bold">
                          <p>{{ number_format($pickup->package->amount,'2') }}</p>
                        </td>
                      @endif
                      <td class="v-align-middle semi-bold"> 
                        {{ $pickup->pickupActivities->first()->deliveryStatus->name }}
                      </td>
                      <td class="v-align-middle semi-bold"> 
                        
                           {{ $pickup->setMaxActivity() }}
                            <select name="delivery_status_id" class="delivery-status full-width text-center" data-init-plugin="select2" data-pickup-id="{{$pickup->id}}" data-customer-id="{{$pickup->user_id}}" style="width:150px;  ">
                              {{-- <option class="text-center" value="0"> {{ $pickup->pickupActivities->first()->deliveryStatus->name }}</option> --}}
                              @foreach ($deliveryStatus as $key=>$status)
                                <option value="{{ $status->id }}"
                                    {{($status->id==$pickup->getMaxActivity())? 'selected': '' }}
                                    
                                    @if($status->id==$pickup->getMaxActivity() + 1 )
                                    
                                    @else 
                                      disabled
                                    @endif>
                                    
                                  {{ $status->name }}
                                </option>
                              @endforeach
                          </select>
                      </td>
                      <td class="v-align-middle semi-bold">
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
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"> </script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"> </script> --}}
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

  <script>

    $(window).on('load', function () {
      $('.delivery-status').each(function(){
        var val = ($(this).children("option:selected").val());
        if(val == 4){ //if in transit for delivery
          $(this).children("option").each(function(){
              if($(this).val() == 5 || $(this).val() == 6){
                $(this).prop('disabled', false);
              }
          });
        }
        if(val == 5){
          $(this).children("option").each(function(){
            if($(this).val() > 5){
                $(this).prop('disabled', false);
              }
          });
        }
        if(val == 6){
          $(this).children("option").each(function(){
            $(this).prop('disabled', true);
          });
        }
      });
    });

    $(document).ready(function(){
       $('#pickup_table').DataTable( {
        fixedHeader: true,
        dom: 'Bfrtip',
        columnDefs: [
            {
              visible: false, 
              targets: [10,12] 
            }
        ],
        buttons: [
            {
              extend: 'excel',
              text: 'Download Excel' ,
              exportOptions: {
                columns: [1,2,3,4,5,6,7,9,10,12]
              }
            },
            {
              extend: 'pdfHtml5',
              text: 'Download PDF',
              orientation: 'landscape',
              pageSize: 'LEGAL' ,
              exportOptions: {
                columns: [1,2,3,4,5,6,7,9,10,12]
              }
            },
        ],
        "pageLength": 15,
        "aaSorting": []
    } );
     @if(!empty($searches))
        var s = {!! json_encode($searches) !!};
        $('#displayCity').tagsinput('add', s["cities"].join());
        $('#displayState').tagsinput('add', s["states"].join());
        $('#displayPostalCode').tagsinput('add', s["postalCodes"].join());
        $('#displayPackageType').tagsinput('add', s["packageTypes"].join());
        $('#displayDeliveryStatus').tagsinput('add', s["deliveryStatuses"].join());
        $('#datepicker-from').val(s['fromDate']);
        $('#datepicker-to').val(s['toDate']);
        $('#newRequest').prop('checked', s['newRequest']);
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

      $("#input-delivery-status").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#dropdown-delivery-status li").filter(function() {
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

    $(function() {
      $('ul#dropdown-delivery-status li').click( function() {
      $('#displayDeliveryStatus').tagsinput('add', $(this).attr('data-value'));
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



  var previous;
  $('.delivery-status') 
    .on('focus', function () {
        previous = this.value;
    })
    .change(function(){
    var index = $(this).children("option:selected").val();
    var pickup_id = $(this).data("pickup-id");
    var cust_id = $(this).data("customer-id");
    var c = confirm("Are you sure you want to update the status?");
    if(c == false){
            this.value = previous;
      return;
    } 

    $.get("{{ route('admin.pickups.updateStatus') }}",{pickup_id: pickup_id, cust_id: cust_id, index: index}, function(data){
        location.reload();
         alert('Successfully update status for ' + data['tracking_number']);
    });

  });



</script>


@endsection
