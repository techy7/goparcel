@extends('layouts.pages.app')

@section('title', __('account.account'))

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-md-4 col-xlg-4"></div>
            <div class="col-md-4 col-xlg-4">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title"><strong>{{ __('account.account') }}</strong></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="mw-80">{{ __('account.profile') }}</h3>
                                <div class="form-group row">
                                  <label for="position" class="col-md-5 control-label"><strong>Username</strong></label>
                                  <div class="col-md-7">
                                    <p aria-label="" class="m-b-10 m-t-5">{{ $user->username ?? 'N/A' }}</p>
                                  </div>
                                </div>
                              <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xlg-4"></div>
        </div>
    </div>
</div>
@endsection
