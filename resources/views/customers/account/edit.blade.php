@extends('layouts.pages.app')

@section('title', 'Account Profile')

@section('content')
<div class="content sm-gutter">
    <div class="container-fluid padding-25 sm-padding-10">
        <h4 class="text-center">Profile Details</h4>
        <form id="form-register" class="p-t-15" role="form" method="POST" action="{{ route('customer.account.update', $user->id) }}">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Enter username" value="{{ old('username', $user->username) }}" class="form-control @error('username') is-invalid @enderror" disabled>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Enter email" value="{{ old('email', $user->email) }}" class="form-control" disabled>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter name" value="{{ old('name', $user->name) }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        {{-- <div class="col-md-6">
                            <div class="form-group form-group-default">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter password" value="{{ old('password', $user->password) }}" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group form-group-default">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" value="{{ old('password', $user->password) }}" placeholder="Enter confirm password" class="form-control" required>
                            </div>
                        </div> --}}
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                            <label>Mobile Number</label>
                            <input type="text" name="m_number" placeholder="Enter mobile number" value="{{ old('m_number', $user->m_number) }}" class="form-control @error('m_number') is-invalid @enderror" required>
                            @error('m_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Enter Address" value="{{ old('address', $user->address) }}" class="form-control" required>
                            </div>
                        </div>
                        </div>
                        <a href="{{ route('customer.account', $user->id) }}" class="btn btn-default btn-cons m-t-10" type="submit">Back</a>
                        <button class="btn btn-primary btn-cons m-t-10 pull-right" type="submit">Update Profile</button>
                </div>
                <div class="col-md-2"></div>
            </div>
      </form>
    </div>
</div>
@endsection