<div class="header ">
    <!-- START MOBILE SIDEBAR TOGGLE -->
    <a href="#" class="btn-link toggle-sidebar d-lg-none pg-icon btn-icon-link" data-toggle="sidebar">
          menu</a>
    <!-- END MOBILE SIDEBAR TOGGLE -->
    <div class="">
      <div class="brand inline   ">
        <img src="{{ asset('pages/assets/img/logo.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/logo.png') }}" data-src-retina="{{ asset('pages/assets/img/logo_2x.png') }}" width="78" height="22">
      </div>
    </div>
    <div class="d-flex align-items-center">
      <!-- START User Info-->
      <div class="dropdown pull-right d-lg-block d-none">
        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
          <span class="thumbnail-wrapper d32 circular inline">
                      <img src="/storage/{{ auth()->user()->profile_picture ?? null }}" alt="" data-src="/storage/{{ auth()->user()->profile_picture }}"
                          data-src-retina="{{ asset('pages/assets/img/profiles/avatar_small2x.jpg') }}" width="32" height="32">
                  </span>
        </button>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
          <span class="dropdown-item">Signed in as <br /><b>{{ auth()->user()->username }}</b></span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('customer.account', auth()->user()->id) }}" class="dropdown-item">Account</a>
          <a href="{{ route('customer.pickup') }}" class="dropdown-item">Schedule a Pickup</a>
          <a href="#" class="dropdown-item">My Pickup Bookings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </div>
      </div>
      <!-- END User Info-->
    </div>
  </div>