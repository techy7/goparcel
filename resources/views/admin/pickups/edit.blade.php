@extends('layouts.pages.app')

@section('title',  __('pickup.edit_pickup'))

@section('upper-links-extend')
  <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('content')
<div class="content">
  <div class="container-fluid padding-25 sm-padding-10">
    <div class="container-fixed-lg">
      <ul class="breadcrumb p-l-0">
        <li class="breadcrumb-item active"><a href="{{ route('admin.pickups') }}">{{ __('general.pickup_schedules')}}</a></li>
        <li class="breadcrumb-item active">{{ __('general.tracking_code')}}: {{ $pickup->tracking_number }}</li>
      </ul>
      <div class="row">
        <div class="col-12">
          <h3 class="page-title">{{ __('pickup.edit_pickup')}}</h3>
        </div>
      </div>
      <form id="form-register" class="p-t-5" role="form" method="POST" action="{{ route('admin.pickups.update', $pickup->id) }}">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card">
              <div class="card-header ">
                <div class="card-title"><h5 class="pull-left card-title">{{ __('pickup.sender_details')}} </h5></div>
              </div>
              
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                      @csrf
                      @method('PATCH')
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default @error('sender_name') has-error @enderror">
                            <label>{{ __('pickup.sender_name')}}</label>
                            <input type="text" class="form-control" name="sender_name" value="{{ old('sender_names', $pickup->sender_name) }}" placeholder="{{ __('pickup.sender_name') }}" />
                          </div>
                          @error('sender_name')
                          <label class="error" for="sender_name">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default @error('pickup_address') has-error @enderror">
                            <label>{{ __('pickup.pickup_address')}}</label>
                            <input type="text" class="form-control" name="pickup_address" value="{{ old('pickup_address', $pickup->pickup_address) }}" placeholder="{{ __('pickup.pickup_address') }}" />
                          </div>
                          @error('pickup_address')
                          <label class="error" for="pickup_address">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default form-group-default-select2 @error('pickup_city') has-error @enderror">
                            <label>{{ __('pickup.pickup_city')}}</label>
                            <select name="pickup_city" id="pickup_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" />
                              <option value="">{{ __('auth.select_field', ['field' => strtolower(__('pickup.pickup_city'))]) }}</option>
                              @foreach (config('location.PH_states_cities') as $state => $cities)
                              <optgroup label="{{ $state }}">
                                @foreach ($cities as $city)<option value="{{ $city }}" {{ old('pickup_city', $pickup->pickup_city) == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                              </optgroup>
                              @endforeach
                            </select>
                          </div>
                          @error('pickup_city')
                          <label class="error" for="pickup_city">{{ $message }}</label>@enderror
                        </div>
                      </div>
                      <input type="hidden" name="pickup_state" value="{{$pickup->pickup_state}}" id="pickup_state"> 

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default @error('pickup_postal_code') has-error @enderror">
                            <label>{{ __('pickup.pickup_postal')}}</label>
                            <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="4" id="pickup_postal_code" name="pickup_postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('pickup_postal_code', $pickup->pickup_postal_code) }}" class="form-control" />
                          </div>
                          @error('pickup_postal_code')
                          <label class="error" for="pickup_postal_code">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default input-group @error('pickup_date') has-error @enderror">
                            <div class="form-input-group">
                              <label>{{ __('pickup.pickup_date')}}</label>
                              <input type="text" class="form-control" name="pickup_date"  value="{{ old('pickup_date') ? old('pickup_date') : date_format($pickup->pickup_date,'yy-m-d')  }}" placeholder="{{ __('auth.select_field', ['field' => strtolower(__('pickup.pickup_date'))]) }}"  id="datepicker-component2" />
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                            </div>
                          </div>
                          @error('pickup_date')
                          <label class="error" for="pickup_date">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>               
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xlg-6">
            <div class="card">
              <div class="card-header ">
                <div class="card-title"><h5 class="pull-left card-title">{{ __('pickup.receiver_details')}} </h5></div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                     
                      
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group form-group-default @error('receiver_name') has-error @enderror">
                          <label>{{ __('pickup.receiver_name')}}</label>
                          <input type="text" class="form-control" name="receiver_name" value="{{ old('receiver_name', $pickup->receiver_name) }}" placeholder="{{ __('pickup.receiver_name') }}" />
                        </div>
                        @error('receiver_name')
                        <label class="error" for="receiver_name">{{ $message }}</label>
                        @enderror
                      </div>
                    </div>

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default @error('receiver_address') has-error @enderror">
                            <label>{{ __('pickup.receiver_address')}}</label>
                            <input type="text" class="form-control" name="receiver_address" value="{{ old('receiver_address', $pickup->receiver_address) }}" placeholder="{{ __('pickup.receiver_address') }}" />
                          </div>
                          @error('receiver_address')
                          <label class="error" for="receiver_address">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default form-group-default-select2 @error('receiver_city') has-error @enderror">
                            <label>{{ __('pickup.receiver_city')}}</label>
                            <select id="receiver_city" name="receiver_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" />
                              <option value="">{{ __('auth.select_field', ['field' => strtolower(__('pickup.receiver_city'))]) }}</option>
                              @foreach (config('location.PH_states_cities') as $state => $cities)
                              <optgroup label="{{ $state }}">
                                @foreach ($cities as $city)<option value="{{ $city }}" {{ old('receiver_city', $pickup->receiver_city) == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                              </optgroup>
                              @endforeach
                            </select>
                          </div>
                          @error('receiver_city')
                          <label class="error" for="receiver_city">{{ $message }}</label>@enderror
                        </div>
                      </div>
                      <input type="hidden" name="receiver_state" value="{{$pickup->receiver_state}}" id="receiver_state"> 
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default @error('receiver_postal_code') has-error @enderror">
                            <label>{{ __('pickup.receiver_postal')}}</label>
                            <input type="text" pattern="[0-9]*" inputmode="numeric" maxlength="4" id="receiver_postal_code" name="receiver_postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('receiver_postal_code', $pickup->receiver_postal_code) }}" class="form-control" />
                          </div>
                          @error('receiver_postal_code')
                          <label class="error" for="receiver_postal_code">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-12">
                          <div class="form-group form-group-default form-group-default-select2 @error('delivery_status_id') has-error @enderror">
                            <label>{{ __('general.delivery_status')}}</label>
                            {{ $pickup->setMaxActivity() }}
                            <select id="delivery-status" name="delivery_status_id" class="full-width" data-init-plugin="select2">
                              @foreach ($deliveryStatus as $key=>$status)
                              <option value="{{ $status->id }}"
                                {{ ($status->id==$pickup->getMaxActivity())? 'selected': '' }}
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
                          <label class="error" for="delivery_status_id">{{ $message }}</label>
                          @enderror
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div
          </div>
        </div>
        <div class="row col-md-12">
          <div class="col-md-12 text-center">
              <div class="btn-group btn-group-md">
                  <a href="{{ route('admin.pickups') }}" class="m-t-15 m-r-15">{{ __('general.back')}}</a>
                  <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">{{ __('general.edit_pickup')}}</button>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('lower-links-extends')
  <script src="{{ asset('pages/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
  <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>

  <script>
    $(document).ready(function(){
      var currentDate = new Date();
      currentDate.setDate(currentDate.getDate());
      //alert(currentDate);
      startDate = "+1d"
      var dt = new Date();
      var d = new Date().setHours(17,0,0,0);
      if (dt > d) {
        dt.setDate(dt.getDate()+2);
      }
      else {
        dt.setDate(dt.getDate()+1);
      }

      $('#datepicker-component2').datepicker({
        format: "yyyy-mm-dd",
        clearBtn: true,
        todayHighlight: true,
        startDate: dt,
      });
    });

    $(function(){
      $('#form-register').validate();
    })

    $(window).on('load', function () {
      var val = $('#delivery-status').children("option:selected").val();
      if (val == 4) { //if in transit for delivery
        $('#delivery-status').children("option").each(function(){
            if($(this).val() == 5 || $(this).val() == 6){
              $(this).prop('disabled', false);
            }
        });
      }
      if (val == 5) {
        $('#delivery-status').children("option").each(function(){
          if($(this).val() > 5){
              $(this).prop('disabled', false);
            }
        });
      }
      if (val == 6) {
        $('#delivery-status').children("option").each(function(){
          $(this).prop('disabled', true);
        });
      }
    });

    $('#receiver_city').change(function () {
      var selectedOption = $('#receiver_city option:selected');
      var label = selectedOption.closest('optgroup').attr('label');
      $('#receiver_state').val(label);
      console.log(label);
    });
    $('#pickup_city').change(function () {
      var selectedOption = $('#pickup_city option:selected');
      var label = selectedOption.closest('optgroup').attr('label');
      $('#pickup_state').val(label);
      console.log(label);
    });
  </script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/form_elements.js') }}"></script>
@endsection
