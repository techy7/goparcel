<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} | Track Delivery</title>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        {{--
        <link rel="apple-touch-icon" href="{{ asset('pages/assets/img/60.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('pages/assets/img/76.png') }}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pages/assets/img/120.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pages/assets/img/152.png') }}" />
        <link rel="icon" type="image/x-icon" href="{{ asset('pages/assets/img/icon.png') }}" /> --}}

        <link href="{{ asset('pages/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('pages/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link href="{{ asset('pages/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
        <link href="{{ asset('pages/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
        <link href="{{ asset('pages/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('pages/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script type="text/javascript">
        window.onload = function() {
          // fix for windows 8
          if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{ asset('pages/pages/css/windows.chrome.fix.css')}}" />'
        }
        </script>

        <style>
            body.dashboard .page-container{
                background: #fff !important;
            }
        </style>
      </head>

    <body class="dashboard bg-white">
        <div class="cotainer" id="app">
            <div class="container mt-5">
                <div class="container  ">
                    <div class="d-flex justify-content-center flex-column ">
                            @if(Session::has('message'))
                                <div class="alert alert-error" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                        @endif
                                <form action="{{ route('track-delivery.show' ) }}" method="get"  data-parsley-validate autocomplete="off" class="d-print-none mb-5" >
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-12 d-flex justify-content-center mt-4">
                                        <div class="form-group form-group-default w-50">
                                            <label>Tracking Number</label>
                                            <input type="text" class="form-control" name="tracking_number" value=""  placeholder="Enter tracking number">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-block btn-lg btn-rounded btn-primary p-3 w-50">Track Order</button>
                                    </div>
                                </form>
                        @if(request()->has('tracking_number'))
                            <div class="row">
                                <p><strong>Tracking Number: </strong> {{$pickupOrder->tracking_number}}<br/>
                                <strong>Parcel Status:</strong>  {{$pickupOrder->pickupActivities->first()->deliveryStatus->name}}</p>

                            </div><br/>
                            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">

                                @foreach ($statuses as $key => $status)
                                    <div class="step" style="color: red">
                                        <div class="step-icon-wrap">
                                            <div class="step-icon" style="{{$key< $count ? 'background: #0b6181; color: white;' : ''}}"><i class="
                                                @if($status->name == 'Order Created') pe-7s-note
                                                @elseif($status->name == 'In Transit for Collection') pe-7s-albums
                                                @elseif($status->name == 'Arrived at Manila Hub') pe-7s-map-marker
                                                @elseif($status->name == 'In Transit for Delivery') pe-7s-car
                                                @elseif($status->name == 'Delivered') pe-7s-box2
                                                @elseif($status->name == 'Back to Sender') pe-7s-back-2
                                                @endif  "></i></div>
                                        </div>
                                        <h4 class="step-title">{{ $status->name }}</h4>
                                        @if($key< $count )
                                            <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $status->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('pages/pages/js/pages.js') }}"></script>
        <script src="{{ asset('pages/assets/js/scripts.js') }}" type="text/javascript"></script>
    </body>
</html>
