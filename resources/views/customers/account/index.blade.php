@extends('layouts.pages.app')

@section('title', 'Account')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="row">
        <div class="col-md-2 col-xlg-2"></div>
        <div class="col-md-8 col-xlg-8">
            <!-- START card -->
            <div class="card">
              <div class="card-header ">
                <div class="card-title">Account</div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="mw-80">Profile Details</h3>
                    {{-- <p class="mw-80">Want it to be more Descriptive and User-Friendly, We Made it possible, Use Separated Form Layouts Structure to Presentation your Form Fields. --}}
                    </p>
                    <br>
                    <form id="form-work" class="form-horizontal" role="form" autocomplete="off">
                      <div class="form-group row">
                        <label for="position" class="col-md-5 control-label"><strong>Username</strong></label>
                        <div class="col-md-7">
                          <p aria-label="" class="m-b-10 m-t-5">{{ auth()->user()->username ?? 'N/A' }}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="position" class="col-md-5 control-label"><strong>Email</strong></label>
                        <div class="col-md-7">
                          <p aria-label="" class="m-b-10 m-t-5">{{ auth()->user()->email ?? 'N/A' }}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="position" class="col-md-5 control-label"><strong>Name</strong></label>
                        <div class="col-md-7">
                          <p aria-label="" class="m-b-10 m-t-5">{{ auth()->user()->name ?? 'N/A' }}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="position" class="col-md-5 control-label"><strong>Mobile Number</strong></label>
                        <div class="col-md-7">
                          <p aria-label="" class="m-b-10 m-t-5">{{ auth()->user()->m_number ?? 'N/A' }}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="position" class="col-md-5 control-label"><strong>Address</strong></label>
                        <div class="col-md-7">
                          <p aria-label="" class="m-b-10 m-t-5">{{ auth()->user()->address ?? 'N/A' }}</p>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                          <a href="{{ route('customer.account.edit', auth()->user()->id) }}" class="btn btn-secondary pull-right">Edit Profile</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- END card -->
          </div>
        <div class="col-md-2 col-xlg-2"></div>
    </div>
    </div>
</div>
@endsection