@extends('extends.main')
@section('title','subscription')
@section('content')
    {{-- work here --}}
    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active">Subscription</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title font-weight-bold">Pending Technicians</h1>
                                <a href="" class="btn btn-primary px-4 m-2 float-right">Add</a>
                               
                            </div>
                            <div class="card-body table-responsive p-2">
                                <table class="datatable table">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Profile</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Contact Number</th>
                                            <th>Email</th>
                                            <th>Skill</th>
                                            <th>Years of experience</th>
                                            <th>Age</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($technicians as $index => $technician)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if($technician->profilepic)
                                                <img src = "/images/profile_pictures/{{$technician->profilepic}}" alt="Profile" style="width:65px; height:65px; float:left; border-radius:50%; margin-right:5px;">
                                                <!-- <img src="{{ url('storage/app/profile_pictures/' . $technician->profilepic) }}" alt="Profile Picture" style="width: 100px; height: auto;"> -->
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $technician->fullname }}</td>
                                            <td>{{ $technician->address }}</td>
                                            <td>{{ $technician->contactnumber }}</td>
                                            <td>{{ $technician->email }}</td>
                                            <td>{{ $technician->skill }}</td>
                                            <td>{{ $technician->yearsofexperience }}</td>
                                            <td>{{ \Carbon\Carbon::parse($technician->dob)->age }}</td>
                                            <td class="text-center">{{ \App\Enums\TechnicianStatus::getDescription($technician->status) }}</td>
                                            <td class="text-center">
                                                <!-- Actions for each technician (approve, delete, etc.) -->
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    
    
    </div>

@endsection