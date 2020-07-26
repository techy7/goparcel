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
    </body>
</html>
