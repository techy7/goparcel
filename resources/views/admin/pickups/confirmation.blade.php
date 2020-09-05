@extends('layouts.pages.app')

@section('title',  __('pickup.delete_pickup'))

@section('upper-links-extend')

@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item active"><a href="{{ route('admin.pickups') }}">{{ __('general.pickup_schedules')}}</a></li>
              <li class="breadcrumb-item active">{{ __('general.tracking_code')}}: {{$pickup->tracking_number}}</li>
            </ul>
            <h3 class="page-title">{{ __('pickup.delete_pickup')}}</h3>
        </div>

        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('admin.pickups.soft-destroy', $pickup->id) }}">
            @csrf
            @method('PUT')

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
                        <a href="{{ route('admin.pickups') }}" class="m-t-15 m-r-15">{{ __('general.back')}}</a>
                        <button class="btn btn-primary btn-lg btn-cons m-t-10" type="submit">{{ __('pickup.delete_pickup')}}</button>
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
