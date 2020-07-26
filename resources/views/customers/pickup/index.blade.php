@extends('layouts.pages.app')

@section('title', 'Schedule a Pickup')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">

      @include('layouts.pages.session')

      <form method="POST" action="{{ route('customer.pickup.store', auth()->user()->username) }}">
        @csrf
        <div class="row">
        <div class="col-md-6 col-xlg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                  <h3 class="mw-80">Pickup Information</h3>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default input-group @error('pickup_date') has-error @enderror">
                            <div class="form-input-group">
                                <label>Date</label>
                                <input type="text" class="form-control" name="pickup_date" value="{{ old('pickup_date') }}" placeholder="Pick a date" id="datepicker-component2">
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
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default @error('pickup_address') has-error @enderror">
                          <label>Address</label>
                          <input type="text" class="form-control" name="pickup_address" value="{{ old('pickup_address') }}" placeholder="123 Manuel St.">
               
                        </div>
                        @error('pickup_address')
                          <label class="error" for="pickup_address">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                    </div>
                    <div class="row clearfix">
                      <div class="col-xl-4">
                        <div class="form-group form-group-default @error('pickup_city') has-error @enderror">
                          <label>{{ __('auth.city') }}</label>
                              <select name="pickup_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" >
                                  <option value="">Select City</option>
                                  @foreach (config('location.PH_states_cities') as $state => $cities)
                                  <optgroup label="{{ $state }}">
                                      @foreach ($cities as $city)<option value="{{ $city }}" {{ old('pickup_city') == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
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
                      <div class="col-xl-4">
                        <div class="form-group form-group-default @error('pickup_postal_code') has-error @enderror">
                          <label>{{ __('auth.postal_code') }}</label>
                          <input type="text" id="pickup_postal_code" name="pickup_postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('pickup_postal_code') }}" class="form-control" >
                        </div>
                        @error('pickup_postal_code')
                            <label class="error" for="pickup_postal_code">
                                {{ $message }}
                            </label>
                        @enderror
                      </div>
                      <div class="col-xl-4">
                        <div class="form-group form-group-default @error('pickup_country') has-error @enderror">
                          <label>{{ __('auth.country') }}</label>
                              <select name="pickup_country" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.country'))]) }}" data-init-plugin="select2" >
                                  <option value="">Select Country</option>
                                  @foreach (config('location.countries') as $country)
                                      <option value="{{ $country }}" {{ old('pickup_country') == $country ? 'selected' : null }}>{{ $country }}</option>
                                  @endforeach
                              </select>
                          </div>
                          @error('pickup_country')
                              <label class="error" for="pickup_country">
                                  {{ $message }}
                              </label>
                          @enderror
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
              <!-- END card -->
          </div>
        <div class="col-md-6 col-xlg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                  <h3 class="mw-80">Receiver Information</h3>
                    <div class="row clearfix">
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_name') has-error @enderror">
                          <label>Name</label>
                          <input type="text" value="{{ old('receiver_name') }}" placeholder="John Doe" name="receiver_name" class="form-control">
                        </div>
                        @error('receiver_name')
                          <label class="error" for="receiver_name">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_email') has-error @enderror">
                          <label>Email</label>
                          <input type="email" value="{{ old('receiver_email') }}" placeholder="email@gmail.com" name="receiver_email" class="form-control">
                        </div>
                        @error('receiver_email')
                          <label class="error" for="receiver_email">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_phone') has-error @enderror">
                          <label>{{ __('auth.mobile_number') }}</label>
                          <input type="text" id="m_number" name="receiver_phone" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.mobile_number'))]) }}" value="{{ old('receiver_phone') }}" class="form-control" >
                      </div>
                      @error('receiver_phone')
                          <label class="error" for="receiver_phone">
                              {{ $message }}
                          </label>
                      @enderror
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_address') has-error @enderror">
                          <label>Address</label>
                          <input type="text" class="form-control" name="receiver_address" value="{{ old('receiver_address') }}" placeholder="123 Manuel St.">
                        </div>
                        @error('receiver_address')
                          <label class="error" for="receiver_address">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-4">
                        <div class="form-group form-group-default @error('receiver_city') has-error @enderror">
                          <label>{{ __('auth.city') }}</label>
                              <select name="receiver_city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" >
                                  <option value="">Select City</option>
                                  @foreach (config('location.PH_states_cities') as $state => $cities)
                                  <optgroup label="{{ $state }}">
                                      @foreach ($cities as $city)<option value="{{ $city }}" {{ old('receiver_city') == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
                                  </optgroup>
                                  @endforeach
                              </select>
                          </div>
                          @error('receiver_city')
                              <label class="error" for="receiver_city">
                                  {{ $message }}
                              </label>
                          @enderror
                      </div>
                      <div class="col-xl-4">
                        <div class="form-group form-group-default @error('receiver_postal_code') has-error @enderror">
                          <label>{{ __('auth.postal_code') }}</label>
                          <input type="text" id="receiver_postal_code" name="receiver_postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('receiver_postal_code') }}" class="form-control" >
                        </div>
                        @error('receiver_postal_code')
                            <label class="error" for="receiver_postal_code">
                                {{ $message }}
                            </label>
                        @enderror
                      </div>
                      <div class="col-xl-4">
                        <div class="form-group form-group-default @error('receiver_country') has-error @enderror">
                          <label>{{ __('auth.country') }}</label>
                              <select name="receiver_country" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.country'))]) }}" data-init-plugin="select2" >
                                  <option value="">Select Country</option>
                                  @foreach (config('location.countries') as $country)
                                      <option value="{{ $country }}" {{ old('receiver_country') == $country ? 'selected' : null }}>{{ $country }}</option>
                                  @endforeach
                              </select>
                          </div>
                          @error('receiver_country')
                              <label class="error" for="receiver_country">
                                  {{ $message }}
                              </label>
                          @enderror
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
              <!-- END card -->
        </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <h1>Package Type</h1>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          @foreach ($packages as $package)
            <label class="btn btn-default">
              <input type="radio" name="package_id" value="{{ $package->id }}"> {{ $package->name }}
            </label>
          @endforeach
        </div>
      </div>
    </div>

    <input type="hidden" value="0" name="package_length">
    <input type="hidden" value="0" name="package_width">
    <input type="hidden" value="0" name="package_height">
    <input type="hidden" value="0" name="package_amount">

    {{-- @dump($productTypes) --}}
    <div class="row">
        <div class="col-md-12">
          <!-- START card -->
          <div id="app">
            <package-item :product-types="{{ $productTypes }}"></package-item>
          </div>
          <!-- END card -->
        </div>
    </div>
    <div class="row">
      <div class="col-5"></div>
      <div class="col-2">
          <div class="btn-group btn-toolbar">
              <button type="submit" class="btn btn-info">
                <div class="p-t-5 p-b-10">
                  <i class="pg-icon">add</i>
                  <div class="font-montserrat text-uppercase">Add Pickup</div>
                </div>
              </button>
          </div>
      </div>
      <div class="col-5"></div>
    </div>
  </form>
    {{-- <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
            <div class="btn-group btn-toolbar">
                <button aria-label="" type="button" class="btn btn-info">
                  <div class="p-t-5 p-b-5">
                    <i class="pg-icon">add</i>
                    <div class="font-montserrat text-uppercase">ADD PICKUP</div>
                  </div>
                </button>
            </div>
        </div>
        <div class="col-5"></div>
    </div> --}}

    </div>
</div>
@endsection

@section('appJs-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('lower-links-extends')
    <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/form_layouts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/notifications.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
    <script>
      $(function(){
        $("#pickup_postal_code").mask("9999");
        $("#receiver_postal_code").mask("9999");
        $("#m_number").mask("(9999) 999-9999");
        $('#form-register').validate();
      })
    </script>
  @endsection