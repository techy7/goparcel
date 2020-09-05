@extends('layouts.pages.app')

@section('title',  __('general.add_permission'))

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item active">{{ __('general.users_access_roles') }}</li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.permissions') }}">{{ __('general.manage_permissions') }}</a></li>
                <li class="breadcrumb-item active">{{ __('general.add_permission')}}</li>
            </ul>
            <h3 class="page-title">{{ __('general.add_permission')}}</h3>
        </div>

        @include('layouts.pages.session')

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.permissions.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('name') has-error @enderror">
                        <label>{{ __('general.permission_name')}}</label>
                        <input type="text" name="name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.permission_name'))]) }}" value="{{ old('name') }}" class="form-control" >
                    </div>
                    @error('name')
                        <label class="error" for="name">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('description') has-error @enderror">
                        <label>{{ __('general.permission_description')}}</label>
                        <input type="text" name="description" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.permission_description'))]) }}" value="{{ old('description') }}" class="form-control" >
                    </div>
                    @error('description')
                        <label class="error" for="description">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group btn-group-md">
                        <a href="{{ route('admin.permissions') }}" class="m-t-15 m-r-15">{{ __('general.back')}}</a>
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">{{ __('general.add_permission')}}</button>
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
