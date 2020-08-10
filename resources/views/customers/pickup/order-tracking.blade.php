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

        <style>
            body.dashboard .page-container{
                background: #fff !important;
            }
        </style>
      </head>
    
    <body class="fixed-header dashboard menu-pin">
        <div class="page-container " id="app">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="register-container full-height sm-p-t-40 sm-p-b-40">
                    <div class="d-flex justify-content-center flex-column full-height ">
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
