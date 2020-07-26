@extends('layouts.pages.app')

@section('upper-links-extend')
    {{-- Error Avatar Account Header and Input Mask --}}
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    {{-- Error Avatar Account Header and Input Mask --}}
@endsection

@section('title', 'Schedule a Pickup')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">

      @include('layouts.pages.session')

        <h1>My Bookings</h1>
        @foreach (auth()->user()->pickups as $pickup)
            <h3>Pickup Information</h3>
            <p>{{ $pickup->id }}</p>
            <p>{{ $pickup->pickup_date }}</p>
            <p>{{ $pickup->pickup_address }}</p>
            <p>{{ $pickup->pickup_city }}</p>
            <p>{{ $pickup->pickup_state }}</p>
            <p>{{ $pickup->pickup_postal_code }}</p>
            <p>{{ $pickup->pickup_country }}</p>
            <h3>Receiver Information</h3>
            <p>{{ $pickup->receiver_name }}</p>
            <p>{{ $pickup->receiver_email }}</p>
            <p>{{ $pickup->receiver_phone }}</p>
            <p>{{ $pickup->receiver_address }}</p>
            <p>{{ $pickup->receiver_city }}</p>
            <p>{{ $pickup->receiver_state }}</p>
            <p>{{ $pickup->receiver_postal_code }}</p>
            <p>{{ $pickup->receiver_country }}</p>
            <h3>Package Information</h3>
            <p>{{ $pickup->package_id }}</p>
            <p>{{ $pickup->package->name }},</p>
            <p>{{ $pickup->package->description }},</p>
            <p>{{ $pickup->package->amount }},</p>
            <hr>
        @endforeach
    </div>
</div>
@endsection

@section('lower-links-extends')
    
  @endsection