@component('mail::message')
# Customer Pickup Details

<strong>Customer Details:</strong><br>
<strong>Name:</strong> {{ $pickup->user->name }}<br>
<strong>Email:</strong> {{ $pickup->user->email }}<br>
<strong>Phone Number:</strong> {{ $pickup->user->m_number }}<br>
<strong>Address:</strong> {{ $pickup->user->address }}<br>
<strong>City:</strong> {{ $pickup->user->city }}<br>
<strong>State:</strong> {{ $pickup->user->state }}<br>
<strong>Postal Code:</strong> {{ $pickup->user->postal_code }}<br>
<strong>Country:</strong> {{ $pickup->user->country }}<br>
<strong>Tracking Number:</strong> {{ $pickup->tracking_number }}<br>
<strong>Pickup Date:</strong> {{ $pickup->pickup_date->format('F d, Y (D)') }}<br>
@if ($pickup->package->name == 'Own Packaging')
  <strong>Total Amount:</strong> {{ $pickup->priceFormatted($pickup->package_amount) }}<br>
@else
  <strong>Total Amount:</strong> {{ $pickup->priceFormatted($pickup->package->amount) }}<br>
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
