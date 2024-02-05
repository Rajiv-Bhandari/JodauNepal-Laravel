@extends('userlayouts.admin')
@section('title', 'Profile')
@section('content')
 
    <div class="card-body table-responsive p-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Your Details</h4>
                    <div class="card card-primary">
                        <form method="POST" action="{{ route('profile.userupdate') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="technician"
                                                placeholder="Enter Name" name="name" value="{{$profile->name }}">
                                            @if ($errors->has('name'))
                                                <x-validation-errors>
                                                    {{ $errors->first('name') }}
                                                </x-validation-errors>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter Email" name="email" value="{{ $profile->email }}" readonly>
                                            @if ($errors->has('email'))
                                                <x-validation-errors>
                                                    {{ $errors->first('email') }}
                                                </x-validation-errors>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contactno">Contact Number</label>
                                            <input type="number" class="form-control" id="contactno"
                                                placeholder="Enter Contact Number" name="contactno" value="{{ $profile->contactno }}">
                                            @if ($errors->has('contactno'))
                                                <x-validation-errors>
                                                    {{ $errors->first('contactno') }}
                                                </x-validation-errors>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="Enter Address" name="address" value="{{ $profile->address }}">
                                            @if ($errors->has('address'))
                                                <x-validation-errors>
                                                    {{ $errors->first('address') }}
                                                </x-validation-errors>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary px-3">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('user.profile.address')
                </div>
            </div>
        </div>
    </div>
@endsection
