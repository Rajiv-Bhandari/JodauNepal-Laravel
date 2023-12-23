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
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#approvalModal{{ $technician->id }}">
                                                    Requested
                                                </button>
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
<!-- Modal for Approve/Reject -->
<div class="modal fade" id="approvalModal{{ $technician->id }}" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">Approve/Reject Technician</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Choose whether to approve or reject the request: <br><br>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>
                            <input type="radio" name="approval_status" value="approved" required> Approve Request
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="radio" name="approval_status" value="rejected"> Reject Request
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection