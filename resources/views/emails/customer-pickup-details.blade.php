@component('mail::message')
 
<style>
    .header1{
        background: #0b6181 !important;
        color: white !important;
        width: 100%;
        padding: 3px !important;
        margin: 0px !important;
    }
    .body{
        margin: 0px !important;
        padding: 0px !important;
        margin-bottom: 10px !important;
        background: white !important;
        border-bottom: none !important;
    }
    td{
        vertical-align: top;
    }
</style>
 

<h1>Hi  {{ $pickup->user->name }},</h1>
<p>
 {{ __('general.order_is_being_shipped', ['field' => $pickup->tracking_number]) }} 
</p>

<div class="header1">
  {{__('general.order_details')}} 
</div>
<div class="body">
   <table>
      <tr>
          <td>{{__('general.tracking_code')}}:</td>
          <td>{{ $pickup->tracking_number }}</td>
      </tr>
      <tr>
          <td>{{__('general.package_type')}}:</td>
          <td>{{ $pickup->package->name }}</td>
      </tr>
      <tr>
          <td>{{__('general.cod')}}:</td>
          <td><b> {{ $pickup->charge_to_sender ? "No" : "Yes" }} </b></td>
      </tr>
   </table>
</div>

<div class="header1">
    {{__('pickup.sender_details')}} 
</div>
<div class="body">
   <table>
       <tr>
           <td>{{__('general.name')}}:</td>
           <td>{{ $pickup->sender_name }}</td>
       </tr>
       <tr>
           <td>{{__('general.phone')}}:</td>
           <td>{{ $pickup->sender_phone }}</td>
       </tr>
       <tr>
           <td>{{__('general.address')}}:</td>
           <td>{{ $pickup->pickup_address }} {{ $pickup->pickup_city }}, {{ $pickup->pickup_state }}, {{ $pickup->pickup_postal_code }}</td>
       </tr>
   </table>
</div>
<div class="header1">
   {{__('pickup.receiver_details')}} 
</div>
<div class="body">
   <table>
       <tr>
           <td>{{ __('general.name')}}:</td>
           <td>{{ $pickup->receiver_name }}</td>
       </tr>
       <tr>
           <td>{{ __('general.phone')}}:</td>
           <td>{{ $pickup->receiver_phone }}</td>
       </tr>
       <tr>
           <td>{{ __('general.address')}}:</td>
           <td>{{ $pickup->receiver_address }} <strong> {{ $pickup->receiver_city }}, {{ $pickup->receiver_state }}</strong>,  {{ $pickup->receiver_postal_code }}</td>
       </tr>
   </table>
</div>

<h4 style="margin: 0px; margin-top: 10px; float:right"><strong>{{ __('pickup.total_amount')}}:</strong> <small>P{{ number_format($pickup->package_amount, 2, '.', ',') }}</small></h4>
<br>
<p style="font-size: 16px !important; line-height:1.5rem !important;">
  
  Regards,<br>
  <strong>   
    {{ config('app.name') }}
  </strong>
 
</p>
@endcomponent
