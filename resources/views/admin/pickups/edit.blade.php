@extends('layouts.pages.app')

@section('title',  __('pickup.edit_pickup'))

@section('upper-links-extend')
  <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('admin.pickups') }}">{{ __('general.pickup_schedules')}}</a></li>
              <li class="breadcrumb-item active">{{ __('general.tracking_code')}}: {{ $pickup->tracking_number }}</li>
            </ul>
            <div class="row">
              <div class="col-md-6">
                <h3 class="page-title">{{ __('pickup.edit_pickup')}}</h3>
              </div>
            </div>
          </div>

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.pickups.update', $pickup->id) }}">
            @csrf
            @method('PATCH')
            
            <div class="row">
                <div class="col-xl-6">
                  <div class="form-group form-group-default input-group @error('pickup_date') has-error @enderror">
                      <div class="form-input-group">
                          <label>{{ __('pickup.pickup_date')}}</label>
                          <input type="text" class="form-control" name="pickup_date" value="{{ old('pickup_date') ?? $pickup->pickup_date->format('F d, Y (D)') }}" placeholder="Pick a Date" id="datepicker-component2">
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                        </div>
                      </div>
                      @error('pickup_date')
                        <label class="error" for="pickup_date">
                            {{ $message }}
                        </label>
                      @enderror
                </div>
                <div class="col-xl-6">
                  <div class="form-group form-group-default @error('pickup_address') has-error @enderror">
                    <label>{{ __('pickup.pickup_address')}}</label>
                    <input type="text" class="form-control" name="pickup_address" value="{{ old('pickup_address', $pickup->pickup_address) }}" placeholder="123 Manuel St.">
        
                  </div>
                  @error('pickup_address')
                    <label class="error" for="pickup_address">
                        {{ $message }}
                    </label>
                  @enderror
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-xl-6">
                  <div class="form-group form-group-default form-group-default-select2 @error('pickup_city') has-error @enderror">
                    <label>{{ __('pickup.pickup_city')}}</label>
                        <select name="pickup_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" >
                            <option value="">{{ __('auth.select_field', ['field' => strtolower(__('pickup.pickup_city'))]) }}</option>
                            @foreach (config('location.PH_states_cities') as $state => $cities)
                            <optgroup label="{{ $state }}">
                                @foreach ($cities as $city)<option value="{{ $city }}" {{ old('pickup_city', $pickup->pickup_city) == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    @error('pickup_city')
                        <label class="error" for="pickup_city">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-xl-6">
                  <div class="form-group form-group-default @error('pickup_postal_code') has-error @enderror">
                    <label>{{ __('pickup.pickup_postal')}}</label>
                    <input type="text" id="pickup_postal_code" name="pickup_postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('pickup_postal_code', $pickup->pickup_postal_code) }}" class="form-control" >
                  </div>
                  @error('pickup_postal_code')
                      <label class="error" for="pickup_postal_code">
                          {{ $message }}
                      </label>
                  @enderror
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-xl-12">
                  <div class="form-group form-group-default form-group-default-select2 @error('delivery_status_id') has-error @enderror">
                    <label>{{ __('general.delivery_status')}}</label>
                        {{ $pickup->setMaxActivity() }}
                        <select id="delivery-status" name="delivery_status_id" class="full-width" data-init-plugin="select2">
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
                    </div>
                    @error('delivery_status_id')
                        <label class="error" for="delivery_status_id">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group btn-group-md">
                        <a href="{{ route('admin.pickups') }}" class="m-t-15 m-r-15">{{ __('general.back')}}</a>
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">{{ __('pickup.edit_pickup')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection

@section('lower-links-extends')
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>
    <script src="{{ asset('pages/assets/js/datepicker-custom.js') }}"></script>

  <script>
    $(function(){
      $("#pickup_postal_code").mask("9999");
      $("#receiver_postal_code").mask("9999");
      $("#m_number").mask("(9999) 999-9999");
      $('#form-register').validate();
    })
   
    $(window).on('load', function () {
        var val = $('#delivery-status').children("option:selected").val();
        if(val == 4){ //if in transit for delivery
          $('#delivery-status').children("option").each(function(){
              if($(this).val() == 5 || $(this).val() == 6){
                $(this).prop('disabled', false);
              }
          });
        }
        if(val == 5){
          $('#delivery-status').children("option").each(function(){
            if($(this).val() > 5){
                $(this).prop('disabled', false);
              }
          });
        }
        if(val == 6){
          $('#delivery-status').children("option").each(function(){
            $(this).prop('disabled', true);
          });
        }
    });
  </script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
@endsection

