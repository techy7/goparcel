<div class="modal fade slide-up disable-scroll" id="modalSlideUp-2" tabindex="-1" role="dialog" aria-labelledby="modalSlideUpLabel" aria-hidden="false">
    <div class="modal-dialog ">
      <div class="modal-content-wrapper">
        <div class="modal-content">
          <div class="modal-header clearfix">
            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
            </button>
              <h5 class="text-uppercase">Recipient Details</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
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
                        <div class="row">
                          <div class="col-xl-12">
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
                        </div>
                        <div class="clearfix"></div>
                    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>