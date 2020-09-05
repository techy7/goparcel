@extends('layouts.pages.app')
 
@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection
 
@section('title', __('general.schedule_a_pickup'))
 
@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
 
      @include('layouts.pages.session')
      @if($errors->any())
        <div class="alert alert-error" role="alert">
            <button aria-label="" class="close" data-dismiss="alert"></button>
            {{ __('validation.error_any')}}
        </div>
      @endif
      <h3 class="page-title">{{ __('general.schedule_a_pickup')}}</h3>

      <div class="page-content-wrapper p-l-0 p-3 m-b-45">
        <form action="{{ route('customer.pickup.store', auth()->user() ) }}" method="post"  data-parsley-validate autocomplete="off" class="d-print-none" >
          @csrf
         
          <div class="row">
            <div class="col-md-6">
              <div id="senderInfo" class="container card mr-3 bg-white">
                  <div class="card-body">
                    <h5 class="pull-left card-title">{{ __('pickup.sender_details')}} </h5> <button id="clear_data" type="button" class="btn btn-danger btn-link pull-right">{{ __('pickup.clear_sender_data')}} </button> 
                    <div class="form-group form-group-default" @error('sender_name') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.sender_name')}} </label>
                      <input type="text" class="form-control" name="sender_name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.sender_name'))]) }}" value="{{old('_token') !== null ? old('sender_name') : auth()->user()->name }}">
                      {{-- @error('sender_name') {{$message}} @enderror --}}
                    </div>
                    <div class="form-group form-group-default" @error('sender_phone') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.sender_phone')}}</label>
                      <input type="text" class="form-control" name="sender_phone" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.sender_phone'))]) }}" value="{{ old('_token') !== null ? old('sender_phone') : auth()->user()->m_number }}">
                    </div>
                    <div class="form-group form-group-default input-group" @error('pickup_date') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                        <div class="form-input-group">
                            <label>{{ __('pickup.pickup_date')}}</label>
                            <input type="text" class="form-control" name="pickup_date"  value="{{ old('pickup_date') }}" placeholder="{{ __('auth.select_field', ['field' => strtolower(__('pickup.pickup_date'))]) }}" data-date-format="dd-M-yyyy" id="datepicker-component2">
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                        </div>
                    </div>
                    <div class="form-group form-group-default" @error('pickup_address') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.pickup_address')}}</label>
                      <input type="text" class="form-control" name="pickup_address" value="{{ old('_token') !== null  ? old('pickup_address') : auth()->user()->address }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.pickup_address'))]) }}">
                    </div>
                    <div class="form-group form-group-default form-group-default-select2" @error('pickup_city') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.pickup_city') }}</label>
                      <select id="pickup_city" name="pickup_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('pickup.pickup_city'))]) }}" data-init-plugin="select2">
                        <option value=""></option>
                        @foreach (config('location.PH_states_cities') as $state => $cities)
                        <optgroup label="{{ $state }}">
                          @foreach ($cities as $city)<option value="{{ $city }}" {{ old('pickup_city') == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                        </optgroup>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group form-group-default" @error('pickup_postal_code') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.pickup_postal')}}</label>
                      <input type="text" class="form-control" name="pickup_postal_code" value="{{ old('_token') !== null ? old('pickup_postal_code') : auth()->user()->postal_code  }}"  placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.pickup_postal'))]) }}">
                    </div>
                  </div>
                </div> 
            </div> {{-- End col 1--}}
            <div class="col-md-6">
              <div id="recipientInfo" class="container card mr-3 bg-white">
                  <div class="card-body">
                    <h5 class="pull-left card-title">{{ __('pickup.receiver_details')}}</h5>
                    <div class="form-group form-group-default"  @error('receiver_name') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.receiver_name')}}</label>
                      <input type="text" class="form-control" name="receiver_name" value="{{ old('receiver_name') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_name'))]) }}" >
                    </div>
                    <div class="form-group form-group-default"  @error('receiver_phone')  style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.receiver_phone')}}</label>
                      <input type="text" class="form-control" name="receiver_phone"   value="{{ old('receiver_phone') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_phone'))]) }}">
                    </div>
                    <div class="form-group form-group-default"  @error('receiver_email')  style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.receiver_email')}}</label>
                      <input type="text" class="form-control" name="receiver_email" value="{{ old('receiver_email') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_email'))]) }}">
                    </div>
                    <div class="form-group form-group-default" @error('receiver_address') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.receiver_address')}}</label>
                      <input type="text" class="form-control" name="receiver_address" value="{{ old('receiver_address') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_address'))]) }}">
                    </div>
                    <div class="form-group form-group-default form-group-default-select2" @error('receiver_city') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.receiver_city') }}</label>
                      <select name="receiver_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('pickup.receiver_city'))]) }}" data-init-plugin="select2">
                        <option value=""></option>
                        @foreach (config('location.PH_states_cities') as $state => $cities)
                        <optgroup label="{{ $state }}">
                          @foreach ($cities as $city)<option value="{{ $city }}" {{ old('receiver_city') == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                        </optgroup>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group form-group-default" @error('receiver_postal_code') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>{{ __('pickup.receiver_postal')}}</label>
                      <input type="text" class="form-control" name="receiver_postal_code" value="{{ old('receiver_postal_code') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_postal'))]) }}">
                    </div>
                  </div>
                </div> 
            </div>{{---End of Col 2--}}
          </div>{{---End of Row 1 --}}

          <div class="row">
            <div class="col-md-6">
              <div id="packageInfro" class="container card mr-3 bg-white">
                <div class="card-body">
                  <h5 class="card-title">{{ __('pickup.choose_package')}}</h5>
                  <div class="row "> @error('radioPackage') <span class="alert alert-error w-100 text-center">{{$message}}</span> @enderror </div>
                  <div class="row"> 
                   @foreach($packages as $package)                
                    <div class="col-md-4">
                      <div class="form-check container-radio text-center">
                        <input class="form-check-input d-none" type="radio" name="radioPackage" id="{{$package->name}}" value="{{$package->name}}">
                        <label class="form-check-label" for="{{$package->name}}">
                          <img alt="Package Picture" width="75" height="45" src="/pages/assets/img/icon.png">
                          <p class="package-title">{{$package->name}}</p>
                          <p class="package-description">{{ __('pickup.max_weight')}} {{$package->max_weight}} kg</p>
                          <p class="package-description price">{{ __('general.amount_peso', ['field' => number_format($package->amount,2)]) }}</p>
                          <p class="package-description rate">{{ __('pickup.rate')}}</p>
                        </label>
                      </div>
                    </div> 
                  @endforeach
                  <div class="row" id="packageDimensions">
                    <p class="btn-block"><em>If your item weight is beyond 5kg, kindly fill this out.</em></p> 
                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('package_length') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label>{{ __('pickup.length')}}</label> 
                        <input id="package_length"  type="number" name="package_length" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                      </div>
                    </div> 
                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('package_width') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label class="fade">{{ __('pickup.width')}}</label> 
                      <input  id="package_width"  type="number" name="package_width" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                      </div>
                    </div> 
                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('package_height') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label>{{ __('pickup.height')}}</label> 
                        <input id="package_height"  type="number" name="package_height" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                        </div>
                      </div>

                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('actual_weight') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label>{{ __('pickup.actual_weight')}}</label> 
                        <input id="actual_weight"  type="number" name="actual_weight" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                      </div>  
                    </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div> {{--End of Col 1--}}

            <div class="col-md-6">
              <div id="fees" class="container card mr-3 bg-white">
                <div class="card-body">
                  <h5 class="card-title">{{ __('pickup.fees_breakdown')}}</h5>
                    
                  <div class="row">
                      <div class="col-md-6">
                        <h5 class="no-margin details-title text-muted"><strong>{{ __('pickup.service_fee')}}</strong></h5>
                      </div> 
                      <div class="col-md-6">
                        <h5 class="pull-right no-margin"> <strong class="text-muted">{{ __('general.amount_peso', ['field' => '']) }}<span id="service_fee"> 0.00 </span></strong></h5>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <h5 class="no-margin details-title text-muted">{{ __('pickup.additional_fee')}}</h5>
                    </div> 
                    <div class="col-md-6">
                        <h5 class="no-margin pull-right"><strong class="text-muted">{{ __('general.amount_peso', ['field' => '']) }}<span id="additional_fee"> 0.00 </span></strong></h5>
                    </div>
                  </div>
                  <hr class="m-2 p-0"/>
                  <div class="row">
                    <div class="col-md-6">
                        <h5 class="no-margin details-title"><strong>{{ __('pickup.total_amount')}}</strong></h5>
                    </div> 
                    <div class="col-md-6">
                        <h5 class="no-margin pull-right"> <strong>{{ __('general.amount_peso', ['field' => '']) }} <span id="total_amount"> 0.00 </span></strong></h5>
                    </div>
                  </div>
                  
                 

                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" {{(old('charge_to') == "1") ? 'checked': ''}}  id="charge_to" name="charge_to">
                        <label class="form-check-label" for="charge_to">
                          {{ __('pickup.check_charge_to')}}
                        </label>
                      </div>
                    </div>
                  </div>
                   <div class="row mt-5 m-2">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-block btn-lg btn-rounded btn-primary p-3 w-50 pull-right">{{ strtoupper(__('pickup.book_now'))}}</button>
                    </div>
                  </div>

                </div>
              </div>
            </div> {{--End of Col 2--}}
          </div>{{--End of Row 2--}}
        </form> {{--End of Form--}}
      </div>
    </div>
 
@endsection
 
@section('appJs-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
 
@section('lower-links-extends')
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>
 
  <script>


    $( document ).ready(function(){
      
      var currentDate = new Date();
      currentDate.setDate(currentDate.getDate());
      //alert(currentDate);
      startDate = "+1d"
      var dt = new Date();
      var d = new Date().setHours(17,0,0,0);
      if(dt > d){
           dt.setDate(dt.getDate()+2);
      } 
      else{
           dt.setDate(dt.getDate()+1);
      }
     
      console.log(dt);
      
      $('#datepicker-component2').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        todayHighlight: true,
        startDate: dt,
      });


      //set selected package record
      var rad = {!! json_encode(old('radioPackage')) !!};
      //$("input[name='radioPackage'][value='"+rad+"']").prop('checked', true);
      if(rad  == "Own Packaging"){
        $("#packageDimensions").show();
      }
      else{
        $("#packageDimensions").hide();
      }
    });

    $(window).on('load', function() {
    // code here
    //set pickup city  if old value is not present
      var val = {!! json_encode(old('pickup_city')) !!} ;
      var text = {!! json_encode(auth()->user()->city) !!};
      if(val == null){
        $("#pickup_city").val(text).change();
      } 
    });

    $(function(){
      $("#pickup_postal_code").mask("9999");
      $("#receiver_postal_code").mask("9999");
      $("#m_number").mask("(9999) 999-9999");
      $('#form-register').validate();
    });

    $('input:radio[name="radioPackage"]').change(function(){
        var chosenPackage = $(this).val();
      
         $.get('computeTotal', {l:0, w:0, h:0,aw:0,package:chosenPackage},function(data){
            //console.log(data['l']);
            $("#service_fee").html(data['amount'].toFixed(2));
            $("#additional_fee").html(data['additional_fee'].toFixed(2));
            $("#total_amount").html(data['total_amount'].toFixed(2));
          });

        if ($(this).is(':checked') && $(this).val()== "Own Packaging") {
          $("#packageDimensions").show();
          $('#packageDimensions input').change(function(){
            var l = $('#package_length').val(); //length
            var w = $('#package_width').val(); //width
            var h = $('#package_height').val(); //height
            var aw = $('#actual_weight').val(); //height
            $.get('computeTotal', {l:l, w:w, h:h,aw:aw,package:chosenPackage},function(data){
              //console.log(data["amount"].toFixed(2));
              $("#service_fee").html(data['amount'].toFixed(2));
              $("#additional_fee").html(data['additional_fee'].toFixed(2));
              $("#total_amount").html(data['total_amount'].toFixed(2));
             });
          });
        }
        else{
            
            $("#packageDimensions").hide();
        }

    });

    $('#clear_data').click(function(){
      //alert("clicked");
        $('#senderInfo input').val("");
        $('#pickup_city').find('option[selected]').removeAttr('selected');
      //$('#pickup_city').val("0");
      
    });


  </script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/timeline.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
@endsection
