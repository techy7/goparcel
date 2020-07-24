@extends('layouts.pages.app')

@section('upper-links-extends')
    {{-- NAGLOLOKO YUNG AVATAR ACCOUNT KAPAG INUNCOMMENT KO TO --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- NAGLOLOKO YUNG AVATAR ACCOUNT KAPAG INUNCOMMENT KO TO --}}
@endsection

@section('title', 'Schedule a Pickup')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">

      @include('layouts.pages.session')

      <form method="POST" action="{{ route('customer.pickup.store') }}">
        @csrf
        <div class="row">
        <div class="col-md-6 col-xlg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                  <h3 class="mw-80">Pickup Information</h3>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default input-group @error('pickup_date') has-error @enderror">
                            <div class="form-input-group">
                                <label>Date</label>
                                <input type="text" class="form-control" name="pickup_date" value="{{ old('pickup_date') }}" placeholder="Pick a date" id="datepicker-component2">
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                              </div>
                            </div>
                            @error('pickup_date')
                              <label class="error" for="pickup_date">
                                  {{ $message }}
                              </label>
                            @enderror
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group form-group-default @error('pickup_location') has-error @enderror">
                          <label>Location</label>
                          <input type="text" class="form-control" name="pickup_location" value="{{ old('pickup_location') }}" placeholder="123 Manuel St.">
               
                        </div>
                        @error('pickup_location')
                          <label class="error" for="pickup_location">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
              <!-- END card -->
          </div>
        <div class="col-md-6 col-xlg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                  <h3 class="mw-80">Receiver Information</h3>
                    <div class="row clearfix">
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_name') has-error @enderror">
                          <label>Name</label>
                          <input type="text" value="{{ old('receiver_name') }}" placeholder="John Doe" name="receiver_name" class="form-control">
                        </div>
                        @error('receiver_name')
                          <label class="error" for="receiver_name">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_email') has-error @enderror">
                          <label>Email</label>
                          <input type="email" value="{{ old('receiver_email') }}" placeholder="email@gmail.com" name="receiver_email" class="form-control">
                        </div>
                        @error('receiver_email')
                          <label class="error" for="receiver_email">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_phone') has-error @enderror">
                          <label>Contact Number</label>
                          <input type="number" class="form-control" name="receiver_phone" value="{{ old('receiver_phone') }}" placeholder="0909 909 0909">
                        </div>
                        @error('receiver_phone')
                          <label class="error" for="receiver_phone">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                      <div class="col-xl-6">
                        <div class="form-group form-group-default @error('receiver_location') has-error @enderror">
                          <label>Location</label>
                          <input type="text" class="form-control" name="receiver_location" value="{{ old('receiver_location') }}" placeholder="123 Manuel St.">
                        </div>
                        @error('receiver_location')
                          <label class="error" for="receiver_location">
                              {{ $message }}
                          </label>
                        @enderror
                      </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
              </div>
              <!-- END card -->
        </div>
    </div>
    {{-- @dump($productTypes) --}}
    <div class="row">
        <div class="col-md-12">
          <!-- START card -->
          <div id="app">
            <package-item :product-types="{{ $productTypes }}"></package-item>
          </div>
          <!-- END card -->
        </div>
    </div>
    <div class="row">
      <div class="col-5"></div>
      <div class="col-2">
          <div class="btn-group btn-toolbar">
              <button type="submit" class="btn btn-info">
                <div class="p-t-5 p-b-10">
                  <i class="pg-icon">add</i>
                  <div class="font-montserrat text-uppercase">Add Pickup</div>
                </div>
              </button>
          </div>
      </div>
      <div class="col-5"></div>
    </div>
  </form>
    {{-- <div class="row">
        <div class="col-5"></div>
        <div class="col-2">
            <div class="btn-group btn-toolbar">
                <button aria-label="" type="button" class="btn btn-info">
                  <div class="p-t-5 p-b-5">
                    <i class="pg-icon">add</i>
                    <div class="font-montserrat text-uppercase">ADD PICKUP</div>
                  </div>
                </button>
            </div>
        </div>
        <div class="col-5"></div>
    </div> --}}

    </div>
</div>
@endsection

@section('lower-links-extends')
    <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/form_layouts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/notifications.js') }}" type="text/javascript"></script>
  @endsection