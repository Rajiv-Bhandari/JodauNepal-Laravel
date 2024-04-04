@extends('technicianlayout.main')
@section('title', 'Profile')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Profile</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile Details</h5>
                            <div class="image-container">
                                @if($technician->profilepic)
                                <img src="/images/profile_pictures/{{ $technician->profilepic }}" alt="Profile" class="profile-image rounded-circle img-thumbnail" >
                                @else
                                <img src="/images/profile_pictures/default.jpg" alt="Profile" class="profile-image rounded-circle img-thumbnail">
                                @endif
                            </div>
                            <p class="card-text">Full Name: {{ $technician->fullname }}</p>
                            <p class="card-text">Contact Number: {{ $technician->contactnumber }}</p>
                            <p class="card-text">Address: {{ $technician->address }}</p>
                            <p class="card-text">Email: {{ $technician->email }}</p>
                            <p class="card-text">Skill: {{ $technician->skill->name }}</p>
                            <p class="card-text">Years of Experience: {{ $technician->yearsofexperience }}</p>
                            <p class="card-text">Date of Birth: {{ \Carbon\Carbon::parse($technician->dob)->format('Y-m-d') }}</p>
                            <p class="card-text">Total Jobs Completed: {{ $technician->totaljobs }}</p>
                            <a href="#" class="btn btn-primary">Update Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
