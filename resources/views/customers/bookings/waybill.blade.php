<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <style>
        body {
            height: 100%;
            margin: 0;
            padding: 0 20px;
            direction: ltr;
            font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            font-size: 0.9rem;
        }

        .row {
            display: flex;
        }

        p {
            margin: 0;
        }

        h4 {
            margin-bottom: 0;
        }
    </style>
    </head>

    <body>
        <div style="padding: 40px; padding-bottom: 0;">
            <div>
                <div>
                    <h2><strong>{{ config('app.name') }}</strong></h2>
                    <h4><strong>TRACKING ID: {{ $userPickup->tracking_number }}</strong></h4>
                    <hr style="margin: 25px 0px -15px 0px">
                        <div style="margin: 15px">
                            <h4><strong>Sender Details:</strong></h4>
                            <p><strong>Name: </strong><small>{{ $userPickup->user->name }}</small></p>
                            <p><strong>Phone Number: </strong><small>{{ $userPickup->user->m_number }}</small></p>
                            <p><strong>Address: </strong><span><small>{{ $userPickup->pickup_address }} {{ $userPickup->pickup_city }}, {{ $userPickup->pickup_state }} {{ $userPickup->pickup_postal_code }}</small></span></p>
                            <p><strong>Pickup Date Scheduled: </strong><span><small>{{ $userPickup->pickup_date->format('F d, Y (D)') }}</small></span></p>
                        </div>
                        <div style="margin: 15px">
                            <h4><strong>Shipment Details:</strong></h4>
                            <p><strong>Tracking No.: </strong><small>{{ $userPickup->tracking_number }}</small></p>
                            <p><strong>Status: </strong><small>{{ $userPickup->pickupActivities->first()->deliveryStatus->name }}</small></p>
                            <p><strong>Shipping Package Type: </strong><small>{{ $userPickup->package->name }}</small></p>
                        </div>
                        <div style="margin: 15px">
                            <h4><strong>Receiver Details:</strong></h4>
                            <p><strong>Name: </strong><small>{{ $userPickup->receiver_name }}</small></p>
                            <p><strong>Email: </strong><small>{{ $userPickup->receiver_email }}</small></p>
                            <p><strong>Phone Number: </strong><small>{{ $userPickup->receiver_phone }}</small></p>
                            <p><strong>Address: </strong><small>{{ $userPickup->receiver_address }} {{ $userPickup->receiver_city }}, {{ $userPickup->receiver_state }} {{ $userPickup->receiver_postal_code }}</small></p>
                        </div>
                    </div>

            <div class="row" style="margin-bottom: -30px !important">
                <div style="padding: 15px">
                        <h4 style="margin: 0px; margin-top: 10px"><strong>Total Payment:</strong> <small>P{{ number_format($userPickup->package_amount, 2, '.', ',') }}</small></h4>
                </div>
                <div style="padding: 15px; margin-left: 400px">
                    <h4 style="margin: 0px; margin-top: 10px"><strong>Signature:</strong></h4>
                </div>
            </div>
            <h4 style="margin: 0px;"><strong>Date:</strong> <small>{{ now()->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</small></h4>
            <hr>
                <p>{{ __('general.copyright') }} {{ date('Y') }} &copy; <strong>{{ config('app.name') }}</strong>. {{ __('general.all_right_reserved') }}.</p>
                </div>
            </div>
        </div>
    </body>
</html>
