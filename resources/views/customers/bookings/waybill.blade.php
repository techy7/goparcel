<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <style>
        @page { size: 10.4cm 14.7cmå; margin: 0px; padding: 0px;}
        body {
            height: 100%;
            margin: 0;
            padding: 0 10px;
            direction: ltr;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 0.7rem;
        }

        p {
            margin: 0;
        }

        h4 {
            margin: 0;
        }
        #container{
            padding: 10px 5px;
            margin-top: 20px;
        }
        #track{
            /* /text-align: center; */
            border: 1px solid black;
            padding: 5px 10px 5px 10px;
        }
        .details{
            margin: 10px 0px 10px 0px; 
            border: 0.5px solid black;  
            padding: 10px;
        }
        a{
            color: black !important;
            text-decoration: none;
            font-weight: bold;
            font-size: large;

        }
        .header{
            width: 100%;
            color: white;
            background: black;
            padding: 5px;
            margin: 0px;
            border: 1px solid black;
        }
        .body{
            margin: 0px;
            margin-bottom: 5px;
            border: 1px solid black;
            padding: 5px;
        }
        .tab { margin-left: 30px; }
        td{
            vertical-align: top;
        }
    </style>
    </head>

    <body>
        <div id="container">
            <img src="data:image/png;base64,{{ $logo }}" alt="logo" width="180" height="75">
            <div style="float:right">
                <i><small>{{__('general.tracking_code')}}</small></i>
                <div id="track">
                     <a href="https://app.weparcelbear.com/track-delivery/track?tracking_number={{ $userPickup->tracking_number }}">{{ $userPickup->tracking_number }}</a>        
                </div>
            </div>
            <div class="header">
               <p> {{__('general.order_details')}} 
             </div>
            <div class="body">
                <table>
                    <tr>
                        <td colspan="2">{{__('general.order_created')}}:</td>
                        <td colspan="2">{{ $userPickup->created_at->setTimezone('Asia/Manila')->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</td>
                    </tr>
                    <tr>            
                        <td>{{__('general.cod')}}:</td>
                        <td><b> {{ $userPickup->charge_to_sender ? "No" : "Yes" }} </b></td>
                        <td>{{__('general.package_type')}}:</td>
                        <td>{{ $userPickup->package->name }}</td>        
                    </tr>
                </table>
            </div>

            <div class="header">
                <p> {{__('pickup.sender_details')}} 
            </div>
            <div class="body">
                <table>
                    <tr>
                        <td>{{__('general.name')}}:</td>
                        <td>{{ $userPickup->sender_name }}</td>
                    </tr>
                    <tr>
                        <td>{{__('general.phone')}}:</td>
                        <td>{{ $userPickup->sender_phone }}</td>
                    </tr>
                    <tr>
                        <td>{{__('general.address')}}:</td>
                        <td>{{ $userPickup->pickup_address }} {{ $userPickup->pickup_city }}, {{ $userPickup->pickup_state }}, {{ $userPickup->pickup_postal_code }}</td>
                    </tr>
                </table>

            </div>
            <div class="header">
                <p> {{__('pickup.receiver_details')}} 
            </div>
            <div class="body">
                <table>
                    <tr>
                        <td>{{ __('general.name')}}:</td>
                        <td>{{ $userPickup->receiver_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('general.phone')}}:</td>
                        <td>{{ $userPickup->receiver_phone }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('general.address')}}:</td>
                        <td>{{ $userPickup->receiver_address }} <strong> {{ $userPickup->receiver_city }}, {{ $userPickup->receiver_state }}</strong>,  {{ $userPickup->receiver_postal_code }}</td>
                    </tr>
                </table>
            
            </div>
            <table width="100%" style="margin-left: 100px; font-size: .7rem;">
                <tr>
                    <td><i>{{__('pickup.service_fee')}}</i></td>
                    <td><i>:</i></td>
                    <td style="text-align: right">P{{ number_format($userPickup->package->amount, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td><i>{{ __('pickup.additional_fee')}}</i></td>
                    <td><i>:</i></td>
                    <td style="text-align: right">P{{ number_format($userPickup->additional_fee, 2, '.', ',') }}</td>
                </tr>
                <tr>
                    <td><i>{{ __('pickup.item_fee')}}</i></td>
                    <td><i>:</i></td>
                    <td style="text-align: right">P{{ number_format($userPickup->item_amount, 2, '.', ',')     }}</td>
                </tr>
                <tr>
                    <td><i><strong>{{ __('pickup.total_amount')}}</strong></i></td>
                    <td><i>:</i></td>
                    <td style="text-align: right"><strong>P{{ number_format($userPickup->item_amount + $userPickup->additional_fee + $userPickup->package->amount, 2, '.', ',')     }}</strong></td>
                </tr>
            </table>
            
            {{-- <h4 style="margin: 0px; margin-top: 10px; float:right"><strong>{{ __('pickup.total_amount')}}:</strong> <small>P{{ number_format($userPickup->package_amount, 2, '.', ',') }}</small></h4> --}}
            <br/>
            <table width="100%">
                <tr>
                    <td width="70%"><i>{{ __('general.comments')}}:</i></td>
                    <td style="text-align: center"> <i>{{ __('general.delivery_attempts')}} <br> <span class="tab">1</span>  <span class="tab">2</span></td>
                </tr>
            </table>   
        </div>
    </body>
</html>
