@extends('layouts.pages.app')

@section('title', 'Roles Permission')

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
                <li class="breadcrumb-item active">{{ __('general.users_access_roles') }}</li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.roles') }}">{{ __('general.manage_access_roles') }}</a></li>
                <li class="breadcrumb-item active">Role's Permissions</li>
            </ul>
            <h3 class="page-title">Role's Permissions</h3>
        </div>

        @include('layouts.pages.session')

            <div class="row justify-content-center">
                <div class="col-md-12">
    
                      <div class="card mb-4">
                          <h6 class="card-header">Access Role Name</h6>
                          <div class="card-body">
                              {{ $role->name }}
                          </div>
                      </div>
    
                      <div class="card mb-4">
                          <h6 class="card-header">Permission</h6>
                          <div class="card-body">
                              @foreach ($rolePermissions as $rolePermission)
                                  <span class="badge badge-default m-1">{{ $rolePermission->name }}</span>
                              @endforeach
                          </div>
                      </div>
    
                      <div class="row">
                          <div class="col-md-12 text-center">
                              <div class="btn-group btn-group-md">
                                  <a href="{{ route('admin.roles') }}">Back</a>
                              </div>
                          </div>
                      </div>
                </div>
            </div>
    </div>
  </div>
@endsection

@section('lower-links-extends')

@endsection
@section('lower-links-extends-page')

@endsection
