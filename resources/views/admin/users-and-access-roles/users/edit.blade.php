@extends('layouts.pages.app')

@section('title', 'Edit User')

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Users and Access Roles</li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.users') }}">Manage Users</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ul>
            <h3 class="page-title">Update User</h3>
        </div>

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('username') has-error @enderror">
                        <label>{{ __('auth.username') }}</label>
                        <input type="text" name="username" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.username'))]) }}" value="{{ old('username') ?? $userDatas->username ?? 'N/A' }}" class="form-control" >
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
                        <input type="email" name="email" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.email'))]) }}" value="{{ old('email') ?? $userDatas->email ?? 'N/A' }}" class="form-control" >
                    </div>
                    @error('email')
                        <label class="error" for="email">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            <div class="row">
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
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('name') has-error @enderror">
                        <label>{{ __('auth.name') }}</label>
                        <input type="text" name="name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.name'))]) }}" value="{{ old('name') ?? $userDatas->name ?? 'N/A' }}" class="form-control" >
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
                        <input type="text" id="m_number" name="m_number" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.mobile_number'))]) }}" value="{{ old('m_number') ?? $userDatas->m_number ?? 'N/A' }}" class="form-control" >
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
                        <input type="text" name="address" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.address'))]) }}" value="{{ old('address') ?? $userDatas->address ?? 'N/A' }}" class="form-control" >
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
                        <input type="text" id="postal_code" name="postal_code" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('auth.postal_code'))]) }}" value="{{ old('postal_code') ?? $userDatas->postal_code ?? 'N/A' }}" class="form-control" >
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
                                @foreach ($cities as $city)<option value="{{ $city }}" {{ old('city') == $city ? 'selected' : null }}>{{ $city }}</option>@endforeach
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <h5 class="text-secondary font-weight-bold" style="margin-left: 9px">Access Roles</h5>
                    <div class="card-body">
                        <div class="row" style="margin-top: -15px">
                            @foreach ($nonCustomerRoles as $nonCustomerRole)
                                <div class="col-lg-4">
                                    <div class="form-check primary">
                                    <input name="roles[]" type="checkbox" id="{{ $nonCustomerRole->name }}" value="{{ $nonCustomerRole->id }}" {{ in_array($nonCustomerRole->id, $userRoles) ? 'checked' : '' }}>
                                    <label for="{{ $nonCustomerRole->name }}">
                                        {{ $nonCustomerRole->name }}
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
                        <a href="{{ route('admin.users') }}" class="m-t-15 m-r-15">Back</a>
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

@endsection
@section('lower-links-extends-page')

@endsection
