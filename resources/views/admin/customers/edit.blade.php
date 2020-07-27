@extends('layouts.pages.app')

@section('title', 'Edit Customer')

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('admin.customers') }}">Customers</a></li>
              <li class="breadcrumb-item active">Edit Customer</li>
            </ul>
            <h3 class="page-title">Update Customer</h3>
        </div>

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.customers.update', $userData->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('username') has-error @enderror">
                        <label>{{ __('auth.username') }}</label>
                        <input type="text" name="username" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.username'))]) }}" value="{{ old('username') ?? $userData->username }}" class="form-control" >
                    </div>
                    @error('username')
                        <label class="error" for="username">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('email') has-error @enderror">
                        <label>{{ __('auth.email') }}</label>
                        <input type="email" name="email" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.email'))]) }}" value="{{ old('email') ?? $userData->email }}" class="form-control" >
                    </div>
                    @error('email')
                        <label class="error" for="email">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            {{-- Uncomment if needed --}}
            {{-- <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('password') has-error @enderror">
                        <label>{{ __('auth.password') }}</label>
                        <input type="password" name="password" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.password'))]) }}" class="form-control" >
                    </div>
                    @error('password')
                        <label class="error" for="password">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required">
                        <label>{{ __('auth.confirm_password') }}</label>
                        <input type="password" name="password_confirmation" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.confirm_password'))]) }}" class="form-control" >
                    </div>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('name') has-error @enderror">
                        <label>{{ __('auth.name') }}</label>
                        <input type="text" name="name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.name'))]) }}" value="{{ old('name') ?? $userData->name }}" class="form-control" >
                    </div>
                    @error('name')
                        <label class="error" for="name">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('m_number') has-error @enderror">
                        <label>{{ __('auth.mobile_number') }}</label>
                        <input type="text" id="m_number" name="m_number" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.mobile_number'))]) }}" value="{{ old('m_number') ?? $userData->m_number }}" class="form-control" >
                    </div>
                    @error('m_number')
                        <label class="error" for="m_number">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group form-group-default required @error('address') has-error @enderror">
                        <label>{{ __('auth.address') }}</label>
                        <input type="text" name="address" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.address'))]) }}" value="{{ old('address') ?? $userData->address }}" class="form-control" >
                    </div>
                    @error('address')
                        <label class="error" for="address">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default @error('postal_code') has-error @enderror">
                        <label>{{ __('auth.postal_code') }}</label>
                        <input type="text" id="postal_code" name="postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('postal_code') ?? $userData->postal_code }}" class="form-control" >
                    </div>
                    @error('postal_code')
                        <label class="error" for="postal_code">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-default form-group-default-select2 required @error('city') has-error @enderror">
                        <label>{{ __('auth.city') }}</label>
                        <select name="city" class="full-width" data-placeholder="{{ __('auth.select_field', ['field' => strtolower(__('auth.city'))]) }}" data-init-plugin="select2" >
                            <option value=""></option>
                            @foreach (config('location.PH_states_cities') as $state => $cities)
                            <optgroup label="{{ $state }}">
                                @foreach ($cities as $city)<option value="{{ $city }}" {{ old('city') == $city ? 'selected' : null }} {{ in_array($city, array($userData->city)) ? 'selected' : '' }}>{{ $city }}</option>@endforeach
                            </optgroup>
                            @endforeach
                        </select>
                    </div>
                    @error('city')
                        <label class="error" for="city">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            <div class="row d-none">
                <div class="col-md-12">
                    <div class="card card-default">
                        <h5 class="text-secondary font-weight-bold" style="margin-left: 9px">Access Roles</h5>
                    <div class="card-body">
                        <div class="row" style="margin-top: -15px">
                            @foreach ($customerRole as $role)
                                <div class="col-lg-4">
                                    <div class="form-check primary">
                                    <input name="roles[]" type="checkbox" id="{{ $role->name }}" value="{{ $role->id }}" checked>
                                    <label for="{{ $role->name }}">
                                        {{ $role->name }}
                                    </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @error('roles')
                                <label class="error" for="roles">
                                    {{ $message }}
                                </label>
                            @enderror
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group btn-group-md">
                        <a href="{{ route('admin.customers') }}" class="m-t-15 m-r-15">Back</a>
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">Edit User</button>
                    </div>
                </div>
            </div>
        </form>
          <!-- END card -->
    </div>
  </div>
@endsection

@section('lower-links-extends')
    <script src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
    <script>
        $(function(){
            $("#postal_code").mask("9999");
            $("#m_number").mask("(9999) 999-9999");
            $('#form-register').validate();
        })
    </script>
@endsection
@section('lower-links-extends-page')

@endsection