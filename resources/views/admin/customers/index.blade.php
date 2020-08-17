@extends('layouts.pages.app')

@section('title', 'Customers')

@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">{{ __('general.customers') }}</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('admin.customers.create') }}">Add Customer</a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.pages.session')

        <div class="container-fixed-lg bg-white">
            <div class="card card-transparent">
                <div class="card-header ">
                  <div class="pull-right">
                    <div class="col-xs-12">
                      <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                        <th>Profile Picture</th>
                        <th>Date Registered</th>
                        <th>Date Modified</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->username }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->name ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->email ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->m_number ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->address ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->city ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->state ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->postal_code ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->country ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->imageAvatarSize() }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->created_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $customer->updated_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <div class="btn-group">
                                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                                    <a href="{{ route('admin.customers.destroy-confirmation', $customer->id) }}" class="btn btn-outline-danger text-danger m-1">Delete</a>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('lower-links-extends')
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pages/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
@endsection
@section('lower-links-extends-page')
    <script src="{{ asset('pages/assets/js/tables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/datatables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('pages/assets/js/demo.js') }}" type="text/javascript"></script>
@endsection
