@extends('layouts.pages.app')

@section('title', __('account.edit_profile'))

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
            <div class="col-md-2 col-lg-3 col-xlg-4"></div>
            <div class="col-md-8 col-lg-6 col-xlg-4">
                <div class="card">
                    <div class="card-header ">
                        <div class="card-title"><strong>{{ __('account.edit_profile') }}</strong></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              <form id="form-edit-profile" class="p-t-15" role="form" enctype="multipart/form-data" method="POST" action="{{ route('customer.account.update', auth()->user()->username) }}">
                                  @csrf
                                  @method('PATCH')

                                  <div class="form-group form-group-default @error('name') has-error @enderror">
                                      <label>{{ __('account.name') }}</label>
                                      <input type="text" name="username" value="{{ old('name', $user->name) }}" placeholder="{{ __('account.enter_field', ['field' => strtolower(__('account.name'))]) }}" class="form-control" required>
                                  </div>
                                  @error('name')
                                  <label class="error" for="username">{{ $message }}</label>
                                  @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <a href="{{ route('customer.account', auth()->user()->username) }}" class="btn btn-default btn-cons" type="submit">{{ __('account.back') }}</a>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary btn-cons text-white pull-right mr-0" type="submit">{{ __('account.update_profile') }}</button>
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

@section('lower-links-extend')
<script src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}" type="text/javascript"></script>
<script>
$(function(){
  //$("#postal_code").mask("9999");
  //$("#m_number").mask("(9999) 999-9999");
  $('#form-edit-profile').validate();
})
</script>
@endsection
