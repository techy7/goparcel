<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
      <img src="{{ asset('pages/assets/img/logo_white.png') }}" alt="logo" class="brand" data-src="{{ asset('pages/assets/img/logo_white.png') }}" data-src-retina="{{ asset('pages/assets/img/logo_white_2x.png') }}" width="78" height="22">
      <div class="sidebar-header-controls">
        <button aria-label="Toggle Drawer" type="button" class="btn btn-icon-link invert sidebar-slide-toggle m-l-20 m-r-10" data-pages-toggle="#appMenu">
          <i class="pg-icon">chevron_down</i>
        </button>
        <button aria-label="Pin Menu" type="button" class="btn btn-icon-link invert d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar">
          <i class="pg-icon"></i>
        </button>
      </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
      <!-- BEGIN SIDEBAR MENU ITEMS-->
      <ul class="menu-items">
        @hasanyrole('Super Admin|User|Customer')
        <li class="m-t-20 ">
          <a href="{{ route('customer.dashboard') }}" class="detailed">
            <span class="title">Dashboard</span>
          </a>
          <span class="icon-thumbnail"><i class="pg-icon">home</i></span>
        </li>
        @endhasanyrole
        @hasanyrole('Super Admin|User')
        <li>
          <a href="javascript:;"><span class="title">ACL</span>
          <span class=" arrow"></span></a>
          <span class="icon-thumbnail"><i class="pg-icon">calendar</i></span>
          <ul class="sub-menu">
            <li class="">
              <a href="calendar.html">Manage Users</a>
              <span class="icon-thumbnail"><i class="pg-icon">c</i></span>
            </li>
            <li class="">
              <a href="calendar_lang.html">Manage Access Roles</a>
              <span class="icon-thumbnail"><i class="pg-icon">l</i></span>
            </li>
            <li class="">
              <a href="calendar_month.html">Manage Permissions</a>
              <span class="icon-thumbnail"><i class="pg-icon">m</i></span>
            </li>
          </ul>
        </li>
        @endhasanyrole
        @hasanyrole('Super Admin|Customer')
        <li class="">
          <a href="{{ route('customer.account.index', auth()->user()->id) }}" class="detailed">
            <span class="title">Account</span>
          </a>
          <span class="icon-thumbnail"><i class="pg-icon">inbox</i></span>
        </li>
        @endhasanyrole
        @hasanyrole('Super Admin|Customer')
        <li>
          <a href="javascript:;"><span class="title">Pickup</span>
          <span class=" arrow"></span></a>
          <span class="icon-thumbnail"><i class="pg-icon">calendar</i></span>
          <ul class="sub-menu">
            <li class="">
              <a href="calendar.html">Basic</a>
              <span class="icon-thumbnail"><i class="pg-icon">c</i></span>
            </li>
            <li class="">
              <a href="calendar_lang.html">Languages</a>
              <span class="icon-thumbnail"><i class="pg-icon">l</i></span>
            </li>
            <li class="">
              <a href="calendar_month.html">Month</a>
              <span class="icon-thumbnail"><i class="pg-icon">m</i></span>
            </li>
            <li class="">
              <a href="calendar_lazy.html">Lazy load</a>
              <span class="icon-thumbnail"><i class="pg-icon">la</i></span>
            </li>
            <li class="">
              <a href="https://docs.pages.revox.io/apps/calendar" rel="noreferrer" target="_blank">Documentation</a>
              <span class="icon-thumbnail"><i class="pg-icon">d</i></span>
            </li>
          </ul>
        </li>
        @endhasanyrole
        @hasanyrole('Super Admin|Customer')
        <li>
          <a href="javascript:;"><span class="title">Bookings</span>
          <span class=" arrow"></span></a>
          <span class="icon-thumbnail"><i class="pg-icon">clipboard</i></span>
          <ul class="sub-menu">
            <li class="">
              <a href="calendar.html">Basic</a>
              <span class="icon-thumbnail"><i class="pg-icon">c</i></span>
            </li>
            <li class="">
              <a href="calendar_lang.html">Languages</a>
              <span class="icon-thumbnail"><i class="pg-icon">l</i></span>
            </li>
            <li class="">
              <a href="calendar_month.html">Month</a>
              <span class="icon-thumbnail"><i class="pg-icon">m</i></span>
            </li>
            <li class="">
              <a href="calendar_lazy.html">Lazy load</a>
              <span class="icon-thumbnail"><i class="pg-icon">la</i></span>
            </li>
            <li class="">
              <a href="https://docs.pages.revox.io/apps/calendar" rel="noreferrer" target="_blank">Documentation</a>
              <span class="icon-thumbnail"><i class="pg-icon">d</i></span>
            </li>
          </ul>
        </li>
        @endhasanyrole
      </ul>
      <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
  </nav>