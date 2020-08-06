<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} | Track Delivery</title>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    
        <link rel="apple-touch-icon" href="{{ asset('pages/assets/img/60.png') }}" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('pages/assets/img/76.png') }}" />
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pages/assets/img/120.png') }}" />
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pages/assets/img/152.png') }}" />
        <link rel="icon" type="image/x-icon" href="{{ asset('pages/assets/img/icon.png') }}" />
    
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
      </head>
    
    <body class="fixed-header dashboard menu-pin">
        <div class="page-container " id="app">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="register-container full-height sm-p-t-40 sm-p-b-40">
                    <div class="d-flex justify-content-center flex-column full-height ">
                        <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center" width="200" height="85">
                        {{-- <div class="card-body" style="padding: 10px 20px 0px 10px !important;">
                                <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                                    @foreach ($pickupOrder->pickupActivities as $key => $active)
                                        <div class="step 
                                                @if(($active->deliveryStatus->name == 'Order Created') || ($active->deliveryStatus->name == 'In Transit for Collection') || ($active->deliveryStatus->name == 'Arrived at Manila Hub') || ($active->deliveryStatus->name == 'In Transit for Delivery') || ($active->deliveryStatus->name == 'Delivered') || ($active->deliveryStatus->name == 'Back to Sender')) completed @endif
                                            ">
                                            <div class="step-icon-wrap">
                                                <div class="step-icon"><i class="
                                                    @if($active->deliveryStatus->name == 'Order Created') pe-7s-note 
                                                    @elseif($active->deliveryStatus->name == 'In Transit for Collection') pe-7s-albums 
                                                    @elseif($active->deliveryStatus->name == 'Arrived at Manila Hub') pe-7s-map-marker 
                                                    @elseif($active->deliveryStatus->name == 'In Transit for Delivery') pe-7s-car 
                                                    @elseif($active->deliveryStatus->name == 'Delivered') pe-7s-box2 
                                                    @elseif($active->deliveryStatus->name == 'Back to Sender') pe-7s-back-2
                                                    @endif
                                                "></i></div>
                                            </div>
                                            <h4 class="step-title">{{ $active->deliveryStatus->name }}</h4>
                                            <h5 class="step-title" style="font-size: 0.6rem !important; margin-top: -10px">{{ $active->updated_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</h5>
                                        </div>
                                    @endforeach
                                </div>
                        </div> --}}
                            <track-delivery></track-delivery>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('pages/pages/js/pages.js') }}"></script>
        <script src="{{ asset('pages/assets/js/scripts.js') }}" type="text/javascript"></script>
    </body>
</html>
