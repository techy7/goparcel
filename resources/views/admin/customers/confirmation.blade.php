@extends('layouts.pages.app')

@section('title', 'Delete Customer')

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('admin.customers') }}">Customers</a></li>
              <li class="breadcrumb-item active">Delete Customer</li>
            </ul>
            <h3 class="page-title">Delete Customer Confirmation</h3>
        </div>

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.customers.destroy', $userData->id) }}">
            @csrf
            @method('DELETE')

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default required @error('email') has-error @enderror">
                        <label>{{ __('auth.email') }}</label>
                        <input type="email" name="email" placeholder="{{ __('Enter Customer Email', ['field' => strtolower(__('auth.email'))]) }}" value="{{ old('email') }}" class="form-control" >
                    </div>
                    @error('email')
                        <label class="error" for="email">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="btn-group btn-group-md">
                        <a href="{{ route('admin.customers') }}" class="m-t-15 m-r-15">Back</a>
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">Delete Customer</button>
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
