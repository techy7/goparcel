@extends('layouts.pages.app')

@section('title', __('account.account'))

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-md-2 col-lg-3 col-xlg-4"></div>
            <div class="col-md-8 col-lg-6 col-xlg-4">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title"><strong>{{ __('account.account') }}</strong></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 form-horizontal">
                                <div class="container-xs-height mt-3">
                                    <div class="row-xs-height">
                                        <div class="social-user-profile col-xs-height text-center col-top">
                                            <div class="thumbnail-wrapper d48 circular bordered b-white">
                                                @if (auth()->user() && auth()->user()->profile_picture)
                                                <img src="{{ $user->imageAvatarSize() }}" alt="{{ auth()->user()->username }}" data-src="{{ $user->imageAvatarSize() }}" data-src-retina="{{ $user->imageAvatarSize() }}" width="32" height="32">
                                                @else
                                                <span>{{ auth()->user()->initials() }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-xs-height p-l-20">
                                            <h3 class="no-margin p-b-5">{{ $user->name ?? null }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label">{{ __('account.username') }}</label>
                                  <div class="col-md-7 p-t-5">
                                    <p>{{ $user->username ?? null }}</p>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label">{{ __('account.email') }}</label>
                                  <div class="col-md-7 p-t-5">
                                    <p>{{ $user->email ?? null }}</p>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label">{{ __('account.mobile_number') }}</label>
                                  <div class="col-md-7 p-t-5">
                                    <p>{{ $user->m_number ?? null }}</p>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label">{{ __('account.address') }}</label>
                                  <div class="col-md-7 p-t-5">
                                    <p>{{ $user->address ?? null }}</p>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label">{{ __('account.city') }}</label>
                                  <div class="col-md-7 p-t-5">
                                    <p>{{ $user->city ?? null }}</p>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label">{{ __('account.postal_code') }}</label>
                                  <div class="col-md-7 p-t-5">
                                    <p>{{ $user->postal_code ?? null }}</p>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"></div>
                            <div class="col-6">
                                <a href="{{ route('customer.account.edit', auth()->user()->username) }}" class="btn btn-primary btn-cons text-white pull-right" role="button">Edit Profile</a>
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
