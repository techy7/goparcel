<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }} | Waybill</title>
        <meta charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <link rel="icon" type="image/x-icon" href="{{ asset('pages/assets/img/icon.png') }}" />
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    
    <body>
        <div class="bg-white" style="padding: 40px; padding-bottom: 0;">
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                            <div>
                                <div class="profile-img-wrapper large m-t-5 inline">
                                    <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center inline-block" width="200" height="89">
                                </div>
                                <div class="inline m-l-20 m-t-20">
                                <p class="small hint-text m-t-10">31 Garnet Street Pleasant Hills San Manuel,
                                    <br> San Jose Del Monte Bulacan
                                    <br> info@parcelbear.com</p>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                            <div>
                                <div>
                                    <img src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" alt="logo" data-src="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" data-src-retina="{{ asset('pages/assets/img/parcel_bear_logo_h-b.png') }}" class="margin-center inline-block" width="200" height="69">
                                </div>
                                <h4>
                                    <br><strong>TRACKING ID: {{ $userPickup->tracking_number }}</strong></h4>
                            </div>
                    </div>
                </div>
                    <hr style="margin: 25px 0px 25px 0px">
                    <div class="row">
                        <div class="col-6">
                        <h4 style="margin: 0px"><strong>Pickup Details:</strong></h4>
                            <p><strong>Address: </strong><span><small>{{ $userPickup->pickup_address }}</small></span></p>
                            <p><strong>City: </strong><span><small>{{ $userPickup->pickup_city }}</small></span></p>
                            <p><strong>State: </strong><span><small>{{ $userPickup->pickup_state }}</small></span></p>
                            <p><strong>Postal Code: </strong><span><small>{{ $userPickup->pickup_postal_code }}</small></span></p>
                            <p><strong>Country: </strong><span><small>{{ $userPickup->pickup_country }}</small></span></p>
                            <p><strong>Pickup Date Scheduled: </strong><span><small>{{ $userPickup->pickup_date->format('F d, Y (D)') }}</small></span></p>
                        </div>
                        <div class="col-6">
                        <h4 style="margin: 0px"><strong>Customer Details:</strong></h4>
                        <p><strong>Name: </strong><small>{{ $userPickup->user->name }}</small></p>
                        <p><strong>Email: </strong><small>{{ $userPickup->user->email }}</small></p>
                        <p><strong>Phone Number: </strong><small>{{ $userPickup->user->m_number }}</small></p>
                        <p><strong>Address: </strong><small>{{ $userPickup->user->address }}</small></p>
                        <p><strong>City: </strong><small>{{ $userPickup->user->city }}</small></p>
                        <p><strong>State: </strong><small>{{ $userPickup->user->state }}</small></p>
                        <p><strong>Postal Code: </strong><small>{{ $userPickup->user->postal_code }}</small></p>
                        <p><strong>Country: </strong><small>{{ $userPickup->user->country }}</small></p>
                        </div>
                    </div>
                <h4 style="margin: 0px"><strong>Shipment Details:</strong></h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col"><strong>Tracking No.</strong></th>
                        <th scope="col"><strong>Status</strong></th>
                        <th scope="col"><strong>Shipping Package Type</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td scope="row">{{ $userPickup->tracking_number }}</td>
                        <td>Arrived</td>
                        <td>{{ $userPickup->package->name }}</td>
                        </tr>
                    </tbody>
                </table>
                <h4 style="margin: 0px; margin-top: 10px"><strong>Receiver Details:</strong></h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col"><strong>Name</strong></th>
                        <th scope="col"><strong>Email</strong></th>
                        <th scope="col"><strong>Phone Number</strong></th>
                        <th scope="col"><strong>Address</strong></th>
                        <th scope="col"><strong>City</strong></th>
                        <th scope="col"><strong>State</strong></th>
                        <th scope="col"><strong>Postal Code</strong></th>
                        <th scope="col"><strong>Country</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td scope="row">{{ $userPickup->receiver_name }}</td>
                        <td scope="row">{{ $userPickup->receiver_email }}</td>
                        <td scope="row">{{ $userPickup->receiver_phone }}</td>
                        <td scope="row">{{ $userPickup->receiver_address }}</td>
                        <td scope="row">{{ $userPickup->receiver_city }}</td>
                        <td scope="row">{{ $userPickup->receiver_state }}</td>
                        <td scope="row">{{ $userPickup->receiver_postal_code }}</td>
                        <td scope="row">{{ $userPickup->receiver_country }}</td>
                        </tr>
                    </tbody>
                </table>

            <div class="row">
                <div class="col-4">
                    @if ($userPickup->package->name == 'Own Packaging')
                        <h4 style="margin: 0px; margin-top: 10px"><strong>Total Payment:</strong> <small>{{ $userPickup->priceFormatted($userPickup->package_amount) }}</small></h4>
                    @else
                        <h4 style="margin: 0px; margin-top: 10px"><strong>Total Payment:</strong> <small>{{ $userPickup->priceFormatted($userPickup->package->amount) }}</small></h4>
                    @endif
                </div>
                <div class="col-4">
                    <h4 style="margin: 0px; margin-top: 10px"><strong>Signature:</strong></h4>
                </div>
                <div class="col-4">
                    <h4 style="margin: 0px; margin-top: 10px"><strong>Date:</strong> <small>{{ now()->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</small></h4>
                </div>
            </div>
            <hr>
                <div class="text-right sm-text-center">
                    <p class="small">{{ __('general.copyright') }} {{ date('Y') }} &copy; <strong>{{ config('app.name') }}</strong>. {{ __('general.all_right_reserved') }}.</p>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>