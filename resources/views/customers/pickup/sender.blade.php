<div class="modal fade slide-up disable-scroll" id="modalSlideUp-1" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header clearfix">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
            </button>
              <h5 class="text-uppercase">Sender Details</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group form-group-default @error('name') has-error @enderror">
                      <label>Sender Name</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
          
                    </div>
                    @error('name')
                      <label class="error" for="name">
                          {{ $message }}
                      </label>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group form-group-default @error('phone_number') has-error @enderror">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="Enter phone_number">
          
                    </div>
                    @error('phone_number')
                      <label class="error" for="phone_number">
                          {{ $message }}
                      </label>
                    @enderror
                  </div>
                </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group form-group-default input-group @error('pickup_date') has-error @enderror">
                                  <div class="form-input-group">
                                      <label>Pickup Date</label>
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
                            <div class="col-xl-12">
                              <div class="form-group form-group-default form-group-default-select2 @error('pickup_city') has-error @enderror">
                                <p style="margin-top: 10px; margin-left: 10px; padding: 0px; margin-bottom: 0px; color: blue; font-weight: bold; color: #196a87 !important;">City</p>
                                {{-- <label class="modal">{{ __('auth.city') }}</label> --}}
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
                          </div>
                            <div class="row clearfix">
                            <div class="col-xl-12">
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
                          </div>
                          <div class="clearfix"></div>
                </div>
        </div>
          </div>
        </div>
      </div>
    </div>
</div>