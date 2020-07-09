<!DOCTYPE html>
<html lang="en">
  @include('layouts.customer.links.upper')
  <body class="fixed-header dashboard">
    <!-- BEGIN SIDEBPANEL-->
        @include('layouts.customer.sidebar')
    <!-- END SIDEBPANEL-->

    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
        @include('layouts.customer.header')
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
          @yield('content')
          
          @include('layouts.customer.footer')
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->

    @include('layouts.customer.links.lower')
  </body>
</html>