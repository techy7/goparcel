@extends('layouts.pages.app')
 
@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection
 
@section('title', 'Schedule a Pickup')
 
@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
 
      @include('layouts.pages.session')
 
      <h3 class="page-title">Schedule a Pickup</h3>

      <div class="page-content-wrapper p-l-0 p-3 m-b-45">
        <div class="row">
          <div class="col-md-6">
            <div id="senderInfo" class="container card mr-3 bg-white">
                <div class="card-body">
                  <h5 class="pull-left card-title">Sender Details </h5>  <a href="" class="pull-right"> Clear Sender Data</a>
                  <div class="form-group form-group-default">
                    <label>Sender Name</label>
                    <input type="text" class="form-control" name="sender_name" placeholder="Enter sender name">
                  </div>
                  <div class="form-group form-group-default">
                    <label>Sender Phone</label>
                    <input type="text" class="form-control" name="sender_number" placeholder="Enter sender phone number">
                  </div>
                  <div class="form-group form-group-default input-group">
                      <div class="form-input-group">
                          <label>Pickup Date</label>
                          <input type="text" class="form-control" name="pickup_date" placeholder="Pick the date of pickup" data-date-format="dd-M-yyyy" id="datepicker-component2">
                      </div>
                      <div class="input-group-append">
                          <span class="input-group-text"><i class="pg-icon">calendar</i></span>
                      </div>
                  </div>
                  <div class="form-group form-group-default">
                    <label>Sender Address</label>
                    <input type="text" class="form-control" name="sender_address" placeholder="Enter sender address">
                  </div>
                  <div class="form-group form-group-default">
                      <label>Sender City</label>
                      <div class="dropdown">
                      <select class="form-control" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group form-group-default">
                    <label>Sender Postal Code</label>
                    <input type="text" class="form-control" name="sender_postal_code" placeholder="Enter sender postal code">
                  </div>
                </div>
              </div> 
          </div> {{-- End col 1--}}
          <div class="col-md-6">
            <div id="recipientInfo" class="container card mr-3 bg-white">
                <div class="card-body">
                  <h5 class="pull-left card-title">Recipient Details</h5>
                  <div class="form-group form-group-default">
                    <label>Recipient Name</label>
                    <input type="text" class="form-control" name="recipient_name" placeholder="Enter recipient name">
                  </div>
                  <div class="form-group form-group-default">
                    <label>Recipient Phone</label>
                    <input type="text" class="form-control" name="recipient_number" placeholder="Enter recipient phone number">
                  </div>
                  <div class="form-group form-group-default">
                    <label>Recipient Email</label>
                    <input type="text" class="form-control" name="recipient_email" placeholder="Enter recipient email">
                  </div>
                  <div class="form-group form-group-default">
                    <label>Recipient Address</label>
                    <input type="text" class="form-control" name="recipient_address" placeholder="Enter recipient address">
                  </div>
                  <div class="form-group form-group-default">
                      <label>Sender City</label>
                      <div class="dropdown">
                      <select class="form-control" id="recipient_city">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group form-group-default">
                    <label>Recipient Postal Code</label>
                    <input type="text" class="form-control" name="recipient_postal_code" placeholder="Enter recipient postal code">
                  </div>
                </div>
              </div> 
          </div>{{---End of Col 2--}}
        </div>{{---End of Row 1 --}}

         <div class="row">
          <div class="col-md-6">
            <div id="packageInfro" class="container card mr-3 bg-white">
              <div class="card-body">
                <h5 class="card-title">Choose Package </h5>
                <label class="pull-left container-radio radio-label">
                    <img alt="Package Picture" width="75" height="45" src="/pages/assets/img/icon.png">
                    <p class="package-title">Pack Name 1</p>
                    <p class="package-description">Max weight: 123 kg</p>
                    <p class="package-description price">Php 100.00</p>
                    <p class="package-description rate">Rate</p>
                    <input type="radio" value="packageTypes[packs]" checked="checked" ">
                    <input type="hidden" name="package_id">
                    <span class="checkmark"></span>
                </label>
                <label class="container-radio radio-label">
                    <img alt="Package Picture" width="75" height="45" src="/pages/assets/img/icon.png">
                    <p class="package-title">Pack Name 1</p>
                    <p class="package-description">Max weight: 123 kg</p>
                    <p class="package-description price">Php 100.00</p>
                    <p class="package-description rate">Rate</p>
                    <input type="hidden" name="package_id">
                    <span class="checkmark"></span>
                </label>
              </div>
            </div>
          </div> {{--End of Col 1--}}

          <div class="col-md-6">
            <div id="fees" class="container card mr-3 bg-white">
              <div class="card-body">
                <h5 class="card-title">Fees and Breakdowns </h5>
                 <div class="row"><div class="col-md-6"><div class="pull-left"><h5 class="no-margin details-title"><strong>Service Fees</strong></h5></div></div> <div class="col-md-6"><div class="pull-right"><h5 class="no-margin"><strong>₱98.00</strong></h5></div></div></div>
                <div class="row m-t-20"><div class="col-md-6"><div class="pull-left"><h5 class="no-margin details-title"><strong>Total Amount</strong></h5></div></div> <div class="col-md-6"><div class="pull-right"><h5 class="no-margin"><strong>₱169.50</strong></h5></div></div></div>
                <div class="row"><div class="col-md-6"><div class="pull-left m-l-10"><h5 class="no-margin text-muted">Additional Weight Fee</h5></div></div> <div class="col-md-6"><div class="pull-right"><h5 class="no-margin text-muted">₱71.50</h5></div></div></div>
                <div class="row m-t-20"><div class="col-md-12"><button class="btn btn-block btn-lg btn-rounded btn-primary m-b-10">BOOK NOW</button></div></div>
              </div>
            </div>
          </div> {{--End of Col 2--}}
        </div>{{--End of Row 2--}}
      </div>
    </div>
 
@endsection
 
@section('appJs-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
 
@section('lower-links-extends')
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script>
    {{-- <script src="{{ asset('pages/assets/js/datepicker-custom.js') }}"></script> --}}
 
  <script>
    $(function(){
      $("#pickup_postal_code").mask("9999");
      $("#receiver_postal_code").mask("9999");
      $("#m_number").mask("(9999) 999-9999");
      $('#form-register').validate();
    });

    $(function(){
        $('#datepicker-component2').datepicker({
          format: "dd-M-yyyy",
          forceParse: true,
          clearBtn: true,
          todayHighlight: true,
          startDate: '+1d'
        });
    });

  </script>
@endsection
@section('lower-links-extends-page')
  <script src="{{ asset('pages/assets/js/timeline.js') }}" type="text/javascript"></script>
  <script src="{{ asset('pages/assets/js/form_elements.js') }}" type="text/javascript"></script>
@endsection
