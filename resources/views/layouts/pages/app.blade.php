<!DOCTYPE html>
<html lang="en">
  @include('layouts.pages.links.upper')
  <body class="fixed-header dashboard">
    <!-- BEGIN SIDEBPANEL-->
        @include('layouts.pages.sidebar')
    <!-- END SIDEBPANEL-->

    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
        @include('layouts.pages.header')
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper full-height">
          @yield('content')

          @include('layouts.pages.footer')
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    @include('layouts.pages.links.lower')
  </body>
</html>
