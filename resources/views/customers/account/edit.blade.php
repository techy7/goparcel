@extends('layouts.pages.app')

@section('title', __('account.edit_profile'))

@section('upper-links-extend')
    <link rel="stylesheet" href="{{ asset('css/image-preview.css') }}">
@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-md-2 col-lg-3 col-xlg-4"></div>
            <div class="col-md-8 col-lg-6 col-xlg-4">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title"><strong>{{ __('account.edit_profile') }}</strong></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              <form id="form-edit-profile" class="p-t-15" role="form" enctype="multipart/form-data" method="POST" action="{{ route('customer.account.update', $user->username) }}">
                                  @csrf
                                  @method('PATCH')
                                  <div class="form-group form-group-default required @error('name') has-error @enderror">
                                      <label>{{ __('account.name') }}</label>
                                      <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="{{ __('account.enter_field', ['field' => strtolower(__('account.name'))]) }}" class="form-control" required>
                                  </div>
                                  @error('name')
                                  <label class="error" for="name">{{ $message }}</label>
                                  @enderror

                                {{-- <div class="form-group form-group-default required @error('email') has-error @enderror">
                                      <label>{{ __('account.email') }}</label>
                                      <input type="text" name="email" value="{{ old('email', $user->email) }}" placeholder="{{ __('account.enter_field', ['field' => strtolower(__('account.email'))]) }}" class="form-control" required>
                                  </div>
                                  @error('email')
                                  <label class="error" for="email">{{ $message }}</label>
                                  @enderror --}}

                                  <div class="form-group form-group-default required @error('m_number') has-error @enderror">
                                      <label>{{ __('account.mobile_number') }}</label>
                                      <input type="text" id="m_number" name="m_number" value="{{ old('m_number', $user->m_number) }}" placeholder="{{ __('account.enter_field', ['field' => strtolower(__('account.mobile_number'))]) }}" class="form-control" required>
                                  </div>
                                  @error('m_number')
                                  <label class="error" for="m_number">{{ $message }}</label>
                                  @enderror

                                  <div class="form-group form-group-default required @error('address') has-error @enderror">
                                      <label>{{ __('account.address') }}</label>
                                      <input type="text" name="address" value="{{ old('address', $user->address) }}" placeholder="{{ __('account.enter_field', ['field' => strtolower(__('account.address'))]) }}" class="form-control" required>
                                  </div>
                                  @error('address')
                                  <label class="error" for="address">{{ $message }}</label>
                                  @enderror

                                  <div class="form-group form-group-default form-group-default-select2 required @error('city') has-error @enderror">
                                    <label>{{ __('auth.city') }}</label>
                                    <select name="city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" >
                                        <option value=""></option>
                                        @foreach (config('location.PH_states_cities') as $state => $cities)
                                        <optgroup label="{{ $state }}">
                                            @foreach ($cities as $city)<option value="{{ $city }}" {{ old('city') == $city ? 'selected' : null }} {{ in_array($city, array($user->city)) ? 'selected' : '' }}>{{ $city }}</option>@endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                                @error('city')
                                    <label class="error" for="city">
                                        {{ $message }}
                                    </label>
                                @enderror

                                  <div class="form-group form-group-default required @error('postal_code') has-error @enderror">
                                      <label>{{ __('account.postal_code') }}</label>
                                      <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" placeholder="{{ __('account.enter_field', ['field' => strtolower(__('account.postal_code'))]) }}" class="form-control" required>
                                  </div>
                                  @error('postal_code')
                                  <label class="error" for="postal_code">{{ $message }}</label>
                                  @enderror
          
                                <div class="card mb-4 no-padding">
                                    <h6 class="card-header no-padding" style="padding-left: 10px !important"><label style="font-weight: bold; color: #196a87 !important;">Profile Picture</label></h6>
                                    <div class="card-body">
        
                                        <label class="custom-file">
                                            <input
                                                id="imageFile"
                                                type="file"
                                                class="custom-file-input form-control @error('profile_picture') is-invalid @enderror"
                                                name="profile_picture"
                                            >
                                            <span class="custom-file-label"></span>
                                        </label>
        
                                        <div class="image-preview" id="imagePreview">
                                            <img src="" alt="Image Preview" class="image-preview__image">
                                            <span class="image-preview__default-text">Image Preview</span>
                                        </div>
                                        @error('profile_picture')
                                        <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                        </span>
                                        @enderror
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <a href="{{ route('customer.account', $user->username) }}" class="btn btn-default btn-cons" type="submit">{{ __('account.back') }}</a>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-cons text-white pull-right mr-0" type="submit">{{ __('account.update_profile') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-3 col-xlg-4"></div>
        </div>
    </div>
</div>
@endsection

@section('lower-links-extends')
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
    <script>
        $(function(){
          $("#postal_code").mask("9999");
          $("#m_number").mask("(9999) 999-9999");
          $('#form-register').validate();
        })
    </script>
    <script src="{{ asset('js/image-preview.js') }}"></script>
@endsection
@section('lower-links-extends-page')
    <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
@endsection