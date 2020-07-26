<nav class="page-sidebar" data-pages="sidebar">
    <div class="sidebar-header d-flex align-items-center">
        <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-lg.png') }}" alt="logo" class="brand margin-center" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-lg.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-lg.png') }}" width="135">
    </div>
    <div class="sidebar-menu">
        <ul class="menu-items">
            @hasanyrole('Super Admin|User|Customer')
            <li class="m-t-10">
                <a href="{{ route('customer.dashboard', auth()->user()->username) }}"><span class="title">{{ __('general.dashboard') }}</span></a>
            </li>
            @endhasanyrole
            @hasanyrole('Super Admin|User|Customer')
            <li class="m-t-10">
                <a href="javascript:;">
                    <span class="title">Users & Access Roles</span>
                    <span class=" arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{ route('admin.users') }}">Manage Users</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.roles') }}">Manage Access Roles</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.permissions') }}">Manage Permissions</a>
                    </li>
                </ul>
            </li>
            @endhasanyrole
            @hasanyrole('Super Admin|Customer')
            <li>
                <a href="{{ route('customer.pickup', auth()->user()->username) }}"><span class="title">{{ __('general.schedule_a_pickup') }}</span></a>
            </li>
            @endhasanyrole
            @hasanyrole('Super Admin|Customer')
            <li>
                <a href="{{ route('customer.bookings', auth()->user()->username) }}"><span class="title">{{ __('general.my_pickup_booking') }}</span></a>
            </li>
            @endhasanyrole
            <li>
                <a href="javascript:;">
                    <span class="title">Calendar</span>
                    <span class=" arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="calendar.html">Basic</a>
                    </li>
                    <li class="">
                        <a href="calendar_lang.html">Languages</a>
                    </li>
                    <li class="">
                        <a href="calendar_month.html">Month</a>
                    </li>
                    <li class="">
                        <a href="calendar_lazy.html">Lazy load</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>
