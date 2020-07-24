<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="{{ asset('pages/assets/img/60.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('pages/assets/img/76.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('pages/assets/img/120.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('pages/assets/img/152.png') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('pages/assets/img/icon.png') }}" />

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />

    <link href="{{ asset('pages/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('pages/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main" href="{{ asset('pages/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link class="child" href="{{ asset('pages/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
    window.onload = function() {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{ asset('pages/pages/css/windows.chrome.fix.css')}}" />'
    }
    </script>
</head>
