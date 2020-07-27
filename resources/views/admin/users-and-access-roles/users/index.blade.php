@extends('layouts.pages.app')

@section('title', __('auth.dashboard'))

@section('upper-links-extend')
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('pages/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
@endsection

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <div class="container-fixed-lg">
            <ul class="breadcrumb p-l-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Users and Access Roles
              <li class="breadcrumb-item active">Manage Users
              </li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">Users</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('admin.users.create') }}">Add User</a>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.pages.session')

        <div class="container-fixed-lg bg-white">
            <div class="card card-transparent">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover" id="basicTable">
                    <thead>
                      <tr>
                        <th style="width:1%" class="text-center">
                          <button aria-label="" class="btn btn-link"><i class="pg-icon">trash_alt</i>
                          </button>
                        </th>
                        {{-- <th style="width:20%">Title</th>
                        <th style="width:20%">Places</th>
                        <th style="width:29%">Activities</th>
                        <th style="width:15%">Status</th>
                        <th style="width:15%">Last Update</th> --}}
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
                        @foreach ($nonCustomers as $nonCustomer)
                        <tr>
                            <td class="v-align-middle">
                                <div class="form-check d-flex align-items-center justify-content-center">
                                  <input type="checkbox" value="3" id="checkbox1">
                                  <label for="checkbox1" class="no-padding no-margin"></label>
                                </div>
                              </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->username }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->name ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->email ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->m_number ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->address ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->city ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->state ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->postal_code ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->country ?? 'N/A' }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->imageAvatarSize() }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->created_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->updated_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <div class="btn-group">
                                    <a href="{{ route('admin.users.edit', $nonCustomer->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                                    <a href="{{ route('admin.users.destroy-confirmation', $nonCustomer->id) }}" class="btn btn-outline-danger m-1">Delete</a>
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
@endsection