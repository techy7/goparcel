@extends('layouts.app')

@section('title', __('general.404_page_not_found'))

@section('content')
<div class="d-flex justify-content-center full-height full-width align-items-center">
    <div class="error-container text-center">
        <h1 class="error-number">{{ __('general.404') }}</h1>
        <h2 class="semi-bold">{{ __('general.404_sorry_but_we_couldnt_find_this_page') }}</h2>
        <p class="p-b-10">{{ __('general.404_this_page_you_are_looking_for_does_not_exsist') }} <a href="@if (Auth::check() && auth()->user()->hasAnyRole('Super Admin', 'Admin')) {{ route('admin.dashboard') }} @elseif (Auth::check() && auth()->user()->hasRole('Customer')) {{ route('customer.dashboard', auth()->user()->username) }} @else {{ route('login') }} @endif"><strong>{{ __('general.404_go_back_to_home') }}</strong></a></p>
    </div>
</div>
@endsection
