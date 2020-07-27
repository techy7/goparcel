@extends('layouts.pages.app')

@section('title', 'Manage Permissions')

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
              <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Users and Access Roles
              <li class="breadcrumb-item active">Manage Permissions
              </li>
            </ul>
            <div class="row">
                <div class="col-md-6">
                    <div class="pull-left">
                        <h3 class="page-title">Permissions</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <a href="{{ route('admin.permissions.create') }}">Add Permission</a>
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
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date Created</th>
                        <th>Date Modified</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($permissions as $permission)
                    <tr>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $permission->name }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $permission->description }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $permission->created_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <p>{{ $permission->updated_at->setTimezone('Asia/Manila')->format('F d, Y (D) - g:i A') }}</p>
                            </td>
                            <td class="v-align-middle semi-bold">
                                <div class="btn-group">
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                                    <form style="margin-top: 4px; margin-left: 2px" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $permission->name }}?')" class="btn btn-outline-danger">Delete</button>
                                    </form>
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
    <script src="{{ asset('pages/assets/js/datatables.js') }}" type="text/javascript"></script>
@endsection
