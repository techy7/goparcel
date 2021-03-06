@extends('layouts.pages.app')

@section('title', __('general.manage_users'))

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
              <li class="breadcrumb-item active">{{ __('general.users_access_roles') }}</li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.users') }}">{{ __('general.manage_users') }}</a></li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">{{ __('general.manage_users')}}</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('admin.users.create') }}">{{ __('general.add_user')}}</a>
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
                        <th>{{ __('auth.username')}}</th>
                        <th>{{ __('auth.name')}}</th>
                        <th>{{ __('auth.email')}}</th>
                        <th>{{ __('auth.mobile_number')}}</th>
                        <th>{{ __('auth.address')}}</th>
                        <th>{{ __('auth.city')}}</th>
                        <th>{{ __('auth.state')}}</th>
                        <th>{{ __('auth.postal_code')}}</th>
                        <th>{{ __('auth.country')}}</th>
                        <th>{{ __('auth.date_registered')}}</th>
                        <th>{{ __('auth.date_modified')}}</th>
                        <th>{{ __('general.action')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($nonCustomers as $nonCustomer)
                        <tr>
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
                                <p>{{ $nonCustomer->created_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $nonCustomer->updated_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary m-1" data-toggle="modal" data-target="#modalSlideUp-{{ $nonCustomer->id }}">{{ __('general.access_roles')}}</button>
                                    <a href="{{ route('admin.users.edit', $nonCustomer->id) }}" class="btn btn-outline-primary m-1">{{ __('general.edit')}}</a>
                                    <a href="{{ route('admin.users.destroy-confirmation', $nonCustomer->id) }}" class="btn btn-outline-danger text-danger m-1">{{ __('general.delete')}}</a>
                                </div>
                            </td>
                        </tr>
                        @include('admin.users-and-access-roles.users.modal')
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
