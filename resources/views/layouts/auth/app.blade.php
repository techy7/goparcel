<!DOCTYPE html>
<html lang="en">
  @include('layouts.auth.links.upper')

  <body class="fixed-header ">
    @yield('content')

    @include('layouts.auth.links.lower')
  </body>
</html>
