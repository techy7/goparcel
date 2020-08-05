<nav class="page-sidebar" data-pages="sidebar">
    <div class="sidebar-header d-flex align-items-center">
        <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-lg.png') }}" alt="logo" class="brand margin-center" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-lg.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-lg.png') }}" width="135">
    </div>
    <div class="sidebar-menu">
        <ul class="menu-items">
            @hasanyrole('Super Admin|User')
            <li class="m-t-10">
                <a href="{{ route('admin.dashboard') }}"><span class="title">{{ __('general.dashboard') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="javascript:;">
                    <span class="title">{{ __('general.users_access_roles') }}</span>
                    <span class=" arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="">
                        <a href="{{ route('admin.users') }}">{{ __('general.manage_users') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.roles') }}">{{ __('general.manage_access_roles') }}</a>
                    </li>
                    <li class="">
                        <a href="{{ route('admin.permissions') }}">{{ __('general.manage_permissions') }}</a>
                    </li>
                </ul>
            </li>
            <li class="m-t-10">
                <a href="{{ route('admin.customers') }}"><span class="title">{{ __('general.customers') }}</span></a>
            </li>
            @endhasanyrole
            @hasanyrole('Super Admin')
            <li class="m-t-10">
                <a href="{{ route('admin.bookings') }}"><span class="title">{{ __('general.bookings') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('admin.pickups') }}"><span class="title">{{ __('general.pickup_schedules') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('admin.packages') }}"><span class="title">{{ __('general.packages') }}</span></a>
            </li>
            @endhasanyrole
            @hasanyrole('Customer')
            <li class="m-t-10">
                <a href="{{ route('customer.dashboard', auth()->user()->username) }}"><span class="title">{{ __('general.dashboard') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('customer.pickup', auth()->user()->username) }}"><span class="title">{{ __('general.schedule_a_pickup') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('customer.bookings', auth()->user()->username) }}"><span class="title">{{ __('general.my_pickup_booking') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('customer.bookings', auth()->user()->username) }}"><span class="title">{{ __('general.help_center') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('customer.bookings', auth()->user()->username) }}"><span class="title">{{ __('general.terms_of_service') }}</span></a>
            </li>
            <li class="m-t-10">
                <a href="{{ route('customer.bookings', auth()->user()->username) }}"><span class="title">{{ __('general.privacy_policy') }}</span></a>
            </li>
            @endhasanyrole
        </ul>
        <div class="clearfix"></div>
    </div>
</nav>
