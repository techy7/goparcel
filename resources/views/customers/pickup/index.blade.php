@extends('layouts.pages.app')
 
@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection
 
@section('title', 'Schedule a Pickup')
 
@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
 
      @include('layouts.pages.session')
      @if($errors->any())
        <div class="alert alert-error" role="alert">
            <button aria-label="" class="close" data-dismiss="alert"></button>
            Please correct all highlighted fields. Hover to view the error.
        </div>
      @endif
      <h3 class="page-title">Schedule a Pickup</h3>

      <div class="page-content-wrapper p-l-0 p-3 m-b-45">
        <form action="{{ route('customer.pickup.store', auth()->user() ) }}" method="post"  data-parsley-validate autocomplete="off" class="d-print-none" >
          @csrf
         
          <div class="row">
            <div class="col-md-6">
              <div id="senderInfo" class="container card mr-3 bg-white">
                  <div class="card-body">
                    <h5 class="pull-left card-title">Sender Details </h5> <button id="clear_data" type="button" class="btn btn-danger btn-link pull-right">Clear Sender Data</button> 
                    <div class="form-group form-group-default" @error('sender_name') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Sender Name</label>
                      <input type="text" class="form-control" name="sender_name" placeholder="Enter sender name" value="{{old('_token') !== null ? old('sender_name') : auth()->user()->name }}">
                      {{-- @error('sender_name') {{$message}} @enderror --}}
                    </div>
                    <div class="form-group form-group-default" @error('sender_phone') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Sender Phone</label>
                      <input type="text" class="form-control" name="sender_phone" placeholder="Enter sender phone number" value="{{ old('_token') !== null ? old('sender_phone') : auth()->user()->m_number }}">
                    </div>
                    <div class="form-group form-group-default input-group" @error('pickup_date') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                        <div class="form-input-group">
                            <label>Pickup Date</label>
                            <input type="text" class="form-control" name="pickup_date"  value="{{ old('pickup_date') }}" placeholder="Select the date of pickup" data-date-format="dd-M-yyyy" id="datepicker-component2">
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                        </div>
                    </div>
                    <div class="form-group form-group-default" @error('pickup_address') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Pickup Address</label>
                      <input type="text" class="form-control" name="pickup_address" value="{{ old('_token') !== null  ? old('pickup_address') : auth()->user()->address }}" placeholder="Enter pickup address">
                    </div>
                    <div class="form-group form-group-default" @error('pickup_city') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                        <label>Pickup City</label> 
                        <div class="dropdown">
                        <select class="form-control" name="pickup_city" id="exampleFormControlSelect1">
                          @foreach($cities["Metro Manila"] as $key => $city)
                            <option value="{{ $key }}" {{ (old("pickup_city") == $key ? "selected":"") }}>{{ $city }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group form-group-default" @error('pickup_postal_code') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Pickup Postal Code</label>
                      <input type="text" class="form-control" name="pickup_postal_code" value="{{ old('_token') !== null ? old('pickup_postal_code') : auth()->user()->postal_code  }}"  placeholder="Enter pickup postal code">
                    </div>
                  </div>
                </div> 
            </div> {{-- End col 1--}}
            <div class="col-md-6">
              <div id="recipientInfo" class="container card mr-3 bg-white">
                  <div class="card-body">
                    <h5 class="pull-left card-title">Receiver Details</h5>
                    <div class="form-group form-group-default"  @error('receiver_name') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Receiver Name</label>
                      <input type="text" class="form-control" name="receiver_name" value="{{ old('receiver_name') }}" placeholder="Enter receiver name" >
                    </div>
                    <div class="form-group form-group-default"  @error('receiver_phone')  style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Receiver Phone</label>
                      <input type="text" class="form-control" name="receiver_phone"   value="{{ old('receiver_phone') }}" placeholder="Enter receiver phone number">
                    </div>
                    <div class="form-group form-group-default"  @error('receiver_email')  style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Receiver Email</label>
                      <input type="text" class="form-control" name="receiver_email" value="{{ old('receiver_email') }}" placeholder="Enter receiver email">
                    </div>
                    <div class="form-group form-group-default" @error('receiver_address') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Receiver Address</label>
                      <input type="text" class="form-control" name="receiver_address" value="{{ old('receiver_address') }}" placeholder="Enter recipient address">
                    </div>
                    <div class="form-group form-group-default" @error('receiver_city') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                        <label>Receiver City</label>
                        <div class="dropdown">
                         <select class="form-control" id="exampleFormControlSelect2" name="receiver_city">
                          @foreach($cities["Metro Manila"] as $key=> $city)
                             <option value="{{ $key }}" {{ (old("receiver_city") == $key ? "selected":"") }}>{{ $city }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group form-group-default" @error('receiver_postal_code') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                      <label>Receiver Postal Code</label>
                      <input type="text" class="form-control" name="receiver_postal_code" value="{{ old('receiver_postal_code') }}" placeholder="Enter recipient postal code">
                    </div>
                  </div>
                </div> 
            </div>{{---End of Col 2--}}
          </div>{{---End of Row 1 --}}

          <div class="row">
            <div class="col-md-6">
              <div id="packageInfro" class="container card mr-3 bg-white">
                <div class="card-body">
                  <h5 class="card-title">Choose Package </h5>
                  <div class="row "> @error('radioPackage') <span class="alert alert-error w-100 text-center">{{$message}}</span> @enderror </div>
                  <div class="row"> 
                   @foreach($packages as $package)                
                    <div class="col-md-4">
                      <div class="form-check container-radio text-center">
                        <input class="form-check-input d-none" type="radio" name="radioPackage" id="{{$package->name}}" value="{{$package->name}}">
                        <label class="form-check-label" for="{{$package->name}}">
                          <img alt="Package Picture" width="75" height="45" src="/pages/assets/img/icon.png">
                          <p class="package-title">{{$package->name}}</p>
                          <p class="package-description">Max weight: {{$package->max_weight}} kg</p>
                          <p class="package-description price">Php {{ number_format($package->amount,2) }}</p>
                          <p class="package-description rate">Rate</p>
                        </label>
                      </div>
                    </div> 
                  @endforeach
                  <div class="row" id="packageDimensions">
                    <p class="btn-block"><em>If your item weight is beyond 4kg, kindly fill this out.</em></p> 
                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('package_length') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label>Length(cm)</label> 
                        <input id="package_length" value="{{ old('package_length') }}"  type="number" name="package_length" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                      </div>
                    </div> 
                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('package_width') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label class="fade">Width(cm)</label> 
                      <input  id="package_width" value="{{ old('package_width') }}" type="number" name="package_width" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                      </div>
                    </div> 
                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('package_height') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label>Height(cm)</label> 
                        <input id="package_height" value="{{ old('package_height') }}" type="number" name="package_height" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                        </div>
                      </div>

                    <div class="col-md-3 p-2">
                      <div class="form-group form-group-default" @error('actual_weight') style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror><label>Actual Weight(kg)</label> 
                        <input id="actual_weight" value="{{ old('actual_weight') }}" type="number" name="actual_weight" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
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
                  <h5 class="card-title">Fees and Breakdowns </h5>
                    
                  <div class="row">
                      <div class="col-md-6">
                        <h5 class="no-margin details-title text-muted"><strong>Service Fee</strong></h5>
                      </div> 
                      <div class="col-md-6">
                        <h5 class="pull-right no-margin"> <strong class="text-muted">Php <span id="service_fee"> 0.00 </span></strong></h5>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <h5 class="no-margin details-title text-muted">Additional Weight Fee</h5>
                    </div> 
                    <div class="col-md-6">
                        <h5 class="no-margin pull-right"><strong class="text-muted">Php <span id="additional_fee"> 0.00 </span></strong></h5>
                    </div>
                  </div>
                  <hr class="m-2 p-0"/>
                  <div class="row">
                    <div class="col-md-6">
                        <h5 class="no-margin details-title"><strong>Total Amount</strong></h5>
                    </div> 
                    <div class="col-md-6">
                        <h5 class="no-margin pull-right"> <strong>Php <span id="total_amount"> 0.00 </span></strong></h5>
                    </div>
                  </div>
                  
                 

                  <div class="row mt-4">
                    <div class="col-md-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" {{(old('charge_to') == "1") ? 'checked': ''}}  id="charge_to" name="charge_to">
                        <label class="form-check-label" for="charge_to">
                          Check this if you want to charge the amount to receiver.
                        </label>
                      </div>
                    </div>
                  </div>

                   <div class="row mt-5 m-2">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-block btn-lg btn-rounded btn-primary p-3 w-50 pull-right">BOOK NOW</button>
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
     <script src="{{ asset('pages/assets/js/datepicker-custom.js') }}"></script>
 
  <script>


    $( document ).ready(function(){
      
      //set selected package record
      var rad = {!! json_encode(old('radioPackage')) !!};
      //$("input[name='radioPackage'][value='"+rad+"']").prop('checked', true);
      if(rad  == "Own Packaging"){
        $("#packageDimensions").show();
      }
      else{
        $("#packageDimensions").hide();
      }
      //set pickup city  if old value is not present
      var val = {!! json_encode(old('pickup_city')) !!} ;
      if(val == null){
        var city = {!! json_encode((array)auth()->user()->city) !!};
        var test = '#exampleFormControlSelect1 option:contains('.concat(city).concat(')');
        $(test).prop('selected',true);
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
       $('#exampleFormControlSelect1').val('0');
    });

  </script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/timeline.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
@endsection
