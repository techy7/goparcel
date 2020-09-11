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
        color: black !important;
    }
    td{
        vertical-align: top;
    }
</style>
 

<h1>Hi  {{ $pickup->receiver_name }},</h1>
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
            <td>
                <a href="https://app.weparcelbear.com/track-delivery/track?tracking_number={{$pickup->tracking_number}}">{{ $pickup->tracking_number }}</a>
            </td>
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
           <td>{{ $pickup->receiver_address }}, <strong> {{ $pickup->receiver_city }}, {{ $pickup->receiver_state }}</strong>,  {{ $pickup->receiver_postal_code }}</td>
       </tr>
   </table>
</div>
<hr>
<div class="body">
    <table width="100%">
        <tr>
            <td><i>{{__('pickup.service_fee')}}</i></td>
            <td><i>:</i></td>
            <td style="text-align: right">P{{ number_format($pickup->package->amount, 2, '.', ',') }}</td>
        </tr>
        <tr>
            <td><i>{{ __('pickup.additional_fee')}}</i></td>
            <td><i>:</i></td>
            <td style="text-align: right">P{{ number_format($pickup->additional_fee, 2, '.', ',') }}</td>
        </tr>
        <tr>
            <td><i>{{ __('pickup.item_fee')}}</i></td>
            <td><i>:</i></td>
            <td style="text-align: right">P{{ number_format($pickup->item_amount, 2, '.', ',')     }}</td>
        </tr>
        <tr>
            <td><i><strong>{{ __('pickup.total_amount')}}</strong></i></td>
            <td><i>:</i></td>
            <td style="text-align: right"><strong>P{{ number_format($pickup->item_amount + $pickup->additional_fee + $pickup->package->amount, 2, '.', ',')     }}</strong></td>
        </tr>
    </table>
</div>
<br>
<div  style="margin-top: 10px !important; color: black !important">
    <p>
    You will receive a message from our rider on the day of the delivery.
    Please keep your lines open so our rider can easily reach you once your parcel is in transit.
    <br><br>
    <b>Got questions?</b> 
    Our team is ready to assist you from 8am - 8pm daily. 
    <br><br>
    (+63) 961 476 2070 <br>
    hello@weparcelbear.com
    </p>
</div>

<p style="font-size: 16px !important; line-height:1.5rem !important;">  
  At Your Service,<br>
  <strong>   
    {{ config('app.name') }}
  </strong>

</p>
@endcomponent
