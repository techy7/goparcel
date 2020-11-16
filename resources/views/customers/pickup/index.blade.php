@extends('layouts.pages.app')

@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ URL::asset('css/Custom/sidescroll.css') }}" rel="stylesheet" type="text/css" >
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
                  <div class="form-group form-group-default required" >
                    <label>{{ __('pickup.sender_name')}} </label>
                    <input type="text" class="form-control" name="sender_name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.sender_name'))]) }}" value="{{old('_token') !== null ? old('sender_name') : auth()->user()->name }}">
                  </div>
                  @error('sender_name')
                    <label class="error" for="sender_name">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default required" >
                    <label>{{ __('pickup.sender_phone')}}</label>
                    <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="15" id="sender_phone_number" class="form-control phone_number"  name="sender_phone" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.sender_phone'))]) }}" value="{{ old('_token') !== null ? old('sender_phone') : auth()->user()->m_number }}">
                  </div>
                  @error('sender_phone')
                    <label class="error" for="sender_phone">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default input-group required">
                      <div class="form-input-group">
                          <label>{{ __('pickup.pickup_date')}}</label>
                          <input type="text" class="form-control" name="pickup_date"  value="{{ old('pickup_date') }}" placeholder="{{ __('auth.select_field', ['field' => strtolower(__('pickup.pickup_date'))]) }}" data-date-format="dd-M-yyyy" id="datepicker-component2">
                      </div>
                      <div class="input-group-append">
                          <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                      </div>
                  </div>
                  @error('pickup_date')
                    <label class="error" for="pickup_date">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default required">
                    <label>{{ __('pickup.pickup_address')}}</label>
                    <input type="text" class="form-control" name="pickup_address" value="{{ old('_token') !== null  ? old('pickup_address') : auth()->user()->address }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.pickup_address'))]) }}">
                  </div>
                  @error('pickup_address')
                    <label class="error" for="pickup_address">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default form-group-default-select2 required">
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
                  @error('pickup_city')
                    <label class="error" for="pickup_city">{{ $message }}</label>
                  @enderror
                  <input type="hidden" name="pickup_state" value="{{auth()->user()->state}}" id="pickup_state"  value="{{ old('pickup_state') }}"> 
                  <div class="form-group form-group-default required" >
                    <label>{{ __('pickup.pickup_postal')}}</label>
                    <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="4" class="form-control postal" name="pickup_postal_code" value="{{ old('_token') !== null ? old('pickup_postal_code') : auth()->user()->postal_code  }}"  placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.pickup_postal'))]) }}">
                  </div>
                  @error('pickup_postal_code')
                    <label class="error" for="pickup_postal_code required">{{ $message }}</label>
                  @enderror
                </div>
              </div>
          </div> {{-- End col 1--}}
          <div class="col-md-6">
            <div id="recipientInfo" class="container card mr-3 bg-white">
                <div class="card-body">
                  <h5 class="pull-left card-title">{{ __('pickup.receiver_details')}}</h5>
                  <div class="form-group form-group-default required">
                    <label>{{ __('pickup.receiver_name')}}</label>
                    <input type="text" class="form-control" name="receiver_name" value="{{ old('receiver_name') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_name'))]) }}" >
                  </div>
                  @error('receiver_name')
                    <label class="error" for="receiver_name">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default required">
                    <label>{{ __('pickup.receiver_phone')}}</label>
                    <input type="text" maxlength="15" id="receiver_phone_number" class="form-control phone_number" name="receiver_phone"   value="{{ old('receiver_phone') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_phone'))]) }}">
                  </div>
                  @error('receiver_phone')
                    <label class="error" for="receiver_phone">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default required">
                    <label>{{ __('pickup.receiver_email')}}</label>
                    <input type="text" class="form-control" name="receiver_email" value="{{ old('receiver_email') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_email'))]) }}">
                  </div>
                  @error('receiver_email')
                    <label class="error" for="receiver_email">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default required">
                    <label>{{ __('pickup.receiver_address')}}</label>
                    <input type="text" class="form-control" name="receiver_address" value="{{ old('receiver_address') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_address'))]) }}">
                  </div>
                  @error('receiver_address')
                    <label class="error" for="receiver_address">{{ $message }}</label>
                  @enderror
                  <div class="form-group form-group-default form-group-default-select2 required">
                    <label>{{ __('pickup.receiver_city') }}</label>
                    <select id="receiver_city" name="receiver_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('pickup.receiver_city'))]) }}" data-init-plugin="select2">
                      <option value=""></option>
                      @foreach (config('location.PH_states_cities') as $state => $cities)
                      <optgroup label="{{ $state }}">
                        @foreach ($cities as $city)<option value="{{ $city }}" {{ old('receiver_city') == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                      </optgroup>
                      @endforeach
                    </select>
                  </div>
                  @error('receiver_city')
                    <label class="error" for="receiver_city">{{ $message }}</label>
                  @enderror
                  <input type="hidden" name="receiver_state" id="receiver_state"  value="{{ old('receiver_state') }}"> 
                  <div class="form-group form-group-default required">
                    <label>{{ __('pickup.receiver_postal')}}</label>
                    <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="4" class="form-control postal" name="receiver_postal_code" value="{{ old('receiver_postal_code') }}" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.receiver_postal'))]) }}">
                  </div>
                  @error('receiver_postal_code')
                    <label class="error" for="receiver_postal_code">{{ $message }}</label>
                  @enderror
                </div>
              </div>
          </div>{{---End of Col 2--}}
        </div>{{---End of Row 1 --}}

        <div class="row">
          <div class="col-md-6">
            <div id="packageInfro" class="container card mr-3 bg-white">
              <div class="card-body">
                <h5 class="card-title mb-0">{{ __('pickup.choose_package')}}</h5>
                <div class="row "> @error('radioPackage') <span class="alert alert-error w-100 text-center">{{$message}}</span> @enderror </div>
                <div class="row my-2 mb-2 p-0">
                  <div class="horizontal-scrollable row flex-row flex-nowrap w-100">
                    @foreach($packages as $package)
                    <div class="col-xs-2 col-sm-3 col-md-4" data-toggle="tooltip" data-placement="top" title="{{$package->description}}" >
                      <div class="form-check text-center">
                        <input class="form-check-input d-none parameter" type="radio" name="radioPackage" id="{{$package->name}}" value="{{$package->name}}" >
                        <label class="form-check-label" for="{{$package->name}}">
                          <img alt="Package Picture" width="70" height="70" src="/pages/assets/img/icon.png">
                          <p class="package-title">{{$package->name}}</p>
                          <p class="package-description">{{ __('pickup.max_weight')}} {{$package->max_weight}} kg</p>
                          <p class="package-description price">{{ __('general.amount_peso', ['field' => number_format($package->amount,2)]) }}</p>
                          <p class="package-description rate">{{ __('pickup.rate')}}</p>
                        </label>
                      </div>
                    </div>
                    @endforeach
                  </div>              
                <div class="row mt-4 w-100">
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input parameter" type="checkbox" value="0"  id="cod" name="cod">
                      <label class="form-check-label" for="cod">
                        {{ __('general.cash_on_delivery')}}
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input parameter" type="checkbox" value="0"  id="charge_to" name="charge_to">
                      <label class="form-check-label" for="charge_to">
                        {{ __('pickup.check_charge_to')}}
                      </label>
                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-default parameter required">
                      <label>{{ __('pickup.item_amount')}}</label>
                      <input type="text" maxlength="10" data-inputmask="'alias': 'decimal', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'placeholder': '0'"  class="form-control amount" name="item_amount" value="0" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('pickup.item_amount'))]) }}" id="item_amount" name="item_amount">
                    </div>
                    @error('item_amount')
                      <label class="error" for="item_amount">{{ $message }}</label>
                    @enderror
                  </div>
                </div>
                
                <div class="row mt-2 w-100">
                  <div class="form-group form-group-default parameter" @error('additional_instruction')  style="border-color: red" data-toggle="tooltip" data-placement="top" title="{{$message}}" @enderror>
                    <label>{{ __('pickup.additional_instruction')}}</label>
                    <textarea class="form-control" id="additional_instruction" name="additional_instruction" maxlength="150" style="height: 60px;" onkeyup="countChar(this)"></textarea>
                  </div>
                  <div class="container-fluid p-0 w-100">
                    <div class="float-right text-small text-muted">
                      <small><span id="charNum">150</span> characters left.</small>
                    </div>  
                  </div>
                </div>
                

                <div class="row mt-2 w-100" id="packageDimensions">
                  <hr class="w-100 p-1 m-1">
                  <p class="btn-block mt-2 text-center"><em>If your item weight is beyond 5kg, kindly fill this out.</em></p>
                  <div class="col-md-3 p-2">
                    <div class="form-group form-group-default parameter required"><label>{{ __('pickup.length')}}</label>
                      <input id="package_length"  type="number" name="package_length" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                    </div>
                    @error('package_length')
                      <label class="error" for="package_length">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="col-md-3 p-2">
                    <div class="form-group form-group-default parameter required"><label class="fade">{{ __('pickup.width')}}</label>
                    <input  id="package_width"  type="number" name="package_width" s150tep="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                    </div>
                    @error('package_width')
                      <label class="error" for="package_length">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="col-md-3 p-2">
                    <div class="form-group form-group-default parameter required"><label>{{ __('pickup.height')}}</label>
                      <input id="package_height"  type="number" name="package_height" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                    </div>
                    @error('package_height')
                      <label class="error" for="package_height">{{ $message }}</label>
                    @enderror
                  </div>
                  <div class="col-md-3 p-2">
                    <div class="form-group form-group-default parameter required"><label>{{ __('pickup.actual_weight')}}</label>
                      <input id="actual_weight"  type="number" name="actual_weight" step="any" oninput="this.value = Math.abs(this.value)" onkeypress="if(this.value.length==6) return false;" class="form-control">
                    </div>
                    @error('actual_weight')
                      <label class="error" for="actual_weight">{{ $message }}</label>
                    @enderror
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
                <div class="row">
                  <div class="col-md-6">
                      <h5 class="no-margin details-title text-muted">{{ __('pickup.item_fee')}}</h5>
                  </div>
                  <div class="col-md-6">
                      <h5 class="no-margin pull-right"><strong class="text-muted">{{ __('general.amount_peso', ['field' => '']) }}<span id="item_fee"> 0.00 </span></strong></h5>
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
</div>
@endsection

@section('lower-links-extends')
  
  <script type="text/javascript" src="{{ asset('pages/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
  <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.2.6/jquery.inputmask.bundle.min.js"></script>
  <script src="{{ asset('pages/assets/js/custom.js') }}" type="text/javascript"></script>
<script>
    $( document ).ready(function(){
      $(".amount").inputmask();
      var currentDate = new Date();
      currentDate.setDate(currentDate.getDate());
      startDate = "+1d"
      var dt = new Date();
      var d = new Date().setHours(17,0,0,0);
      if(dt > d){
           dt.setDate(dt.getDate()+2);
      }
      else{
           dt.setDate(dt.getDate()+1);
      }

      $('#datepicker-component2').datepicker({
        daysOfWeekDisabled: [0, 7],
        format: "yyyy-mm-dd",
        clearBtn: true,
        todayHighlight: true,
        startDate: dt,
      });

       $("#packageDimensions").hide();

    });

    $(window).on('load', function() {
     //set pickup city  if old value is not present
      var val = {!! json_encode(old('pickup_city')) !!} ;
      var text = {!! json_encode(auth()->user()->city) !!};
     
      if(val == null){
        $("#pickup_city").val(text).change();
      }
    });

  </script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/timeline.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
@endsection
