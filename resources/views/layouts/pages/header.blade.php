<div class="header ">
    <a href="#" class="btn-link toggle-sidebar d-lg-none pg-icon btn-icon-link" data-toggle="sidebar">menu</a>
    <div>
        <div class="brand inline"><img src="{{ asset('pages/assets/img/152.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/152.png') }}" data-src-retina="{{ asset('pages/assets/img/152.png') }}" width="38" height="38"></div>
    </div>
    <div class="d-flex align-items-center">
        <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
                <span class="thumbnail-wrapper d32 circular inline">
                    @if (auth()->user()->profile_picture)
                    <img src="{{ asset('pages/assets/img/profiles/avatar_small2x.jpg') }}" alt="" data-src="{{ asset('pages/assets/img/profiles/avatar_small2x.jpg') }}" data-src-retina="{{ asset('pages/assets/img/profiles/avatar_small2x.jpg') }}" width="32" height="32">
                    @else
                    <span>{{ auth()->user()->initials() }}</span>
                    @endif
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                <span class="dropdown-item">
                    {{ __('general.signed_in_as') }}<br />
                    <a href="{{ route('customer.account', auth()->user()->username) }}" class="px-0"><strong>{{ auth()->user()->username }}</strong></a>
                </span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('customer.account', auth()->user()->username) }}" class="dropdown-item">{{ __('general.account') }}</a>
                <a href="{{ route('customer.pickup', auth()->user()->username) }}" class="dropdown-item">{{ __('general.schedule_a_pickup') }}</a>
                <a href="{{ route('customer.bookings', auth()->user()->username) }}" class="dropdown-item">{{ __('general.my_pickup_bookings') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('general.logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>
    </div>
</div>
