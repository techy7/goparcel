    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <style>
            @page { size: 10cm 20cm landscape; margin: 0px; }
            body {
                height: 100%;
                margin: 0;
                padding: 0 20px;
                direction: ltr;
                font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
                font-size: 0.7rem;
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
                        <img src="data:image/png;base64,{{ $logo }}" alt="logo" width="180" height="75">
                        <div style="margin: 5px; float:right;">
                                <p><strong>Tracking No.: </strong><small>{{ $userPickup->tracking_number }}</small></p>
                                <p><strong>Status: </strong><small>{{ $userPickup->pickupActivities->first()->deliveryStatus->name }}</small></p>
                                <p><strong>Shipping Package Type: </strong><small>{{ $userPickup->package->name }}</small></p>
                                <p><strong>Cash-on-delivery: </strong><small>{{ $userPickup->charge_to_sender ? "Yes" : "No" }}</small></p>
                            </div>
                            <h4 style="margin-top: -4px !important"><strong>TRACKING ID: <a href="https://app.weparcelbear.com/track-delivery/track?tracking_number={{ $userPickup->tracking_number }}">{{ $userPickup->tracking_number }}</a></strong></h4>
                            <hr style="margin: 5px 0px -15px 0px">
                            <div style="margin: 5px; width:50%; float:right">
                                <h4><strong>Receiver Details:</strong></h4>
                                <p><strong>Name: </strong><small>{{ $userPickup->receiver_name }}</small></p>
                                <p><strong>Email: </strong><small>{{ $userPickup->receiver_email }}</small></p>
                                <p><strong>Phone Number: </strong><small>{{ $userPickup->receiver_phone }}</small></p>
                                <p><strong>Address: </strong>{{ $userPickup->receiver_address }} <u><strong style="color: darkblue;"> {{ $userPickup->receiver_city }}, {{ $userPickup->receiver_state }} </strong></u> {{ $userPickup->receiver_postal_code }}</p>
                            </div>
                            <div style="margin: 5px width:50%;">
                                <h4><strong>Sender Details:</strong></h4>
                                <p><strong>Name: </strong><small>{{ $userPickup->user->name }}</small></p>
                                <p><strong>Phone Number: </strong><small>{{ $userPickup->user->m_number }}</small></p>
                                <p><strong>Address: </strong><span><small>{{ $userPickup->pickup_address }} {{ $userPickup->pickup_city }}, {{ $userPickup->pickup_state }} {{ $userPickup->pickup_postal_code }}</small></span></p>
                                <p><strong>Pickup Date Scheduled: </strong><span><small>{{ $userPickup->pickup_date->format('F d, Y (D)') }}</small></span></p>
                            </div>
                            
                        </div>
                            <hr style="margin: 20px 0px 5px 0px;">
                            <div style="padding: 5px;float:right;">
                                    <h4 style="margin: 0px; margin-top: 10px"><strong>Total Payment:</strong> <small>P{{ number_format($userPickup->package_amount, 2, '.', ',') }}</small></h4>
                            </div>
                            <div style="padding: 5px; ">
                                <h4 style="margin: 0px; margin-top: 10px"><strong>Signature:</strong></h4>
                            </div>
                            <br/>
                            <br/>
                            <h4 style="margin: 0px;"><strong>Date:</strong> <small>{{ now()->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</small></h4>
                        </div>
                </div>
            </div>
        </body>
    </html>
