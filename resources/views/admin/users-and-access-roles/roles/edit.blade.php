@extends('layouts.pages.app')

@section('title',  __('general.edit_access_role'))

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item active">{{ __('general.users_access_roles') }}</li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.roles') }}">{{ __('general.manage_access_roles') }}</a></li>
                <li class="breadcrumb-item active">{{ __('general.edit_access_role')}}</li>
            </ul>
            <h3 class="page-title">{{ __('general.edit_access_role')}}</h3>
        </div>

        @include('layouts.pages.session')

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.roles.update', $role->id) }}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('name') has-error @enderror">
                        <label>{{ __('general.role_name')}}</label>
                        <input type="text" name="name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.role_name'))]) }}" value="{{ old('name', $role->name) }}" class="form-control" >
                    </div>
                    @error('name')
                        <label class="error" for="name">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('description') has-error @enderror">
                        <label>{{ __('general.role_description')}}</label>
                        <input type="text" name="description" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.role_description'))]) }}" value="{{ old('description', $role->description) }}" class="form-control" >
                    </div>
                    @error('description')
                        <label class="error" for="description">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <h5 class="text-secondary font-weight-bold" style="margin-left: 9px">{{ __('general.permissions')}}</h5>
                        <div class="card-body">
                            <div class="row" style="margin-top: -15px">
                                @foreach ($permissions as $permission)
                                    <div class="col-lg-4">
                                        <div class="form-check primary">
                                        <input name="permission[]" type="checkbox" id="{{ $permission->name }}" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                        <label for="{{ $permission->name }}">
                                            {{ $permission->name }}
                                        </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @error('permission')
                                    <label class="error" for="permission">
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
                        <a href="{{ route('admin.roles') }}" class="m-t-15 m-r-15">{{ __('general.back')}}</a>
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">{{ __('general.edit_access_role')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection

@section('lower-links-extends')

@endsection
@section('lower-links-extends-page')

@endsection
