@extends('technicianlayout.main')
@section('title', 'Profile')
@section('content')
 
<div class="content-wrapper pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card card-primary">
                <h4 style="margin-left:25px;margin-top:20px;">Your Details</h4>
                    <form method="POST" action="#" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="technician"
                                            placeholder="Enter Name" name="name" value="{{ $technician->fullname }}">
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
                                            placeholder="Enter Email" name="email" value="{{ $technician->email }}" readonly>
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
                                            placeholder="Enter Contact Number" name="contactno" value="{{ $technician->contactnumber }}">
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
                                            placeholder="Enter Address" name="address" value="{{ $technician->address }}">
                                        @if ($errors->has('address'))
                                            <x-validation-errors>
                                                {{ $errors->first('address') }}
                                            </x-validation-errors>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="skill">Skill</label>
                                        <input type="text" class="form-control" id="skill"
                                            name="skill" value="{{ $technician->skill->name }}" readonly>
                                        @if ($errors->has('skill'))
                                            <x-validation-errors>
                                                {{ $errors->first('skill') }}
                                            </x-validation-errors>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="yearsofexperience">Years of Experience</label>
                                        <input type="text" class="form-control" id="yearsofexperience"
                                            placeholder="Enter yearsofexperience" name="yearsofexperience" value="{{ $technician->yearsofexperience }}" readonly>
                                        @if ($errors->has('yearsofexperience'))
                                            <x-validation-errors>
                                                {{ $errors->first('yearsofexperience') }}
                                            </x-validation-errors>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Age</label>
                                        @php
                                            $dob = \Carbon\Carbon::parse($technician->dob);
                                            $age = $dob->age;
                                        @endphp
                                        <input type="text" class="form-control" id="age"
                                            name="age" value="{{ $age }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="totaljobs">Total Jobs Completed</label>
                                        <input type="text" class="form-control" id="totaljobs"
                                            placeholder="Enter totaljobs" name="totaljobs" value="{{ $technician->totaljobs }}" readonly>
                                        @if ($errors->has('totaljobs'))
                                            <x-validation-errors>
                                                {{ $errors->first('totaljobs') }}
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
            </div>
        </div>
    </div>
</div>
@endsection
