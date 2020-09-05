@extends('layouts.pages.app')

@section('title', __('general.add_access_role'))

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active">{{ __('general.users_access_roles') }}</li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.roles') }}">{{ __('general.manage_access_roles') }}</a></li>
              <li class="breadcrumb-item active">{{ __('general.add_access_role')}}</li>
            </ul>
            <h3 class="page-title">{{ __('general.add_access_role')}}</h3>
        </div>

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.roles.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group form-group-default required @error('name') has-error @enderror">
                        <label>{{ __('general.role_name')}}</label>
                        <input type="text" name="name" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.role_name'))]) }}" value="{{ old('name') }}" class="form-control" >
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
                        <input type="text" name="description" placeholder="{{ __('auth.enter_field', ['field' => strtolower(__('general.role_description'))]) }}" value="{{ old('description') }}" class="form-control" >
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
                                    @foreach ($permissions as $permissions)
                                        <div class="col-lg-4">
                                            <div class="form-check primary">
                                            <input name="permission[]" type="checkbox" id="{{ $permissions->name }}" value="{{ $permissions->id }}">
                                            <label for="{{ $permissions->name }}">
                                                {{ $permissions->name }}
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
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">{{ __('general.add_access_role')}}</button>
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
