<!DOCTYPE html>
<html lang="en">
    @include('layouts.pages.links.upper')
    <body class="fixed-header dashboard menu-pin">
        @include('layouts.pages.sidebar')

        <div class="page-container ">
            @include('layouts.pages.header')
            <div class="page-content-wrapper full-height">
                @yield('content')

                @include('layouts.pages.footer')
            </div>
        </div>

        @include('layouts.pages.links.lower')
        <!-- BEGIN VENDOR JS -->
        {{-- nasa lower na to --}}
    {{-- <script src="{{ asset('pages/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{ asset('pages/assets/plugins/liga.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script> --}}
        {{-- nasa lower na to --}}

    
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    {{-- <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{ asset('pages/pages/js/pages.js') }}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('pages/assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{ asset('pages/assets/js/datatables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/scripts.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS --> --}}
    </body>
</html>
