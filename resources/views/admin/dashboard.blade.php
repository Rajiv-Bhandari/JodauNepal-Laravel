@extends('extends.main')
@section('title','Technicians')
@section('content')
    {{-- work here --}}
    @include('sweetalert::alert')
    <div class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item active">Technicians</li>
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
                                <h1 class="card-title font-weight-bold">Technicians</h1>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary px-4 m-2 float-right">All Technicians</a>
                                <a href="{{ route('admin.dashboard', ['status' => 'rejected']) }}" class="btn btn-danger px-4 m-2 float-right">Rejected</a>
                                <a href="{{ route('admin.dashboard', ['status' => 'approved']) }}" class="btn btn-success px-4 m-2 float-right">Approved</a>
                                <a href="{{ route('admin.dashboard', ['status' => 'requested']) }}" class="btn btn-warning px-4 m-2 float-right">Requested</a>
                            </div>
                            <div class="card-body table-responsive p-2">
                            @if ($technicians->isEmpty())
                                <h5 style="text-align:center;">No technicians available for this status.</h5>
                            @else
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
                                            <!-- <th class="text-center">Status</th> -->
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach($technicians as $index => $technician)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if($technician->profilepic)
                                                    <img src = "/images/profile_pictures/{{$technician->profilepic}}" alt="Profile" style="width:65px; height:65px; float:left; border-radius:50%; margin-right:5px;">
                                                @else
                                                    <img src = "/images/profile_pictures/default.jpg" alt="Profile" style="width:65px; height:65px; float:left; border-radius:50%; margin-right:5px;">
                                                @endif
                                            </td>
                                            <td>{{ $technician->fullname }}</td>
                                            <td>{{ $technician->address }}</td>
                                            <td>{{ $technician->contactnumber }}</td>
                                            <td>{{ $technician->email }}</td>
                                            <td>{{ $technician->skill->name }}</td>
                                            <td>{{ $technician->yearsofexperience }}</td>
                                            <td>{{ \Carbon\Carbon::parse($technician->dob)->age }}</td>
                                            <td class="text-center">
                                            @if($technician->status==0)
                                                <button class="btn btn-warning btn-sm btn-request" data-toggle="modal" data-target="#RequestedModal" data-request-id="{{ $technician->id }}">Requested</button>

                                            @elseif($technician->status==1)
                                                <button class="btn btn-success btn-sm">Approved</button>
                                            @elseif($technician->status==2)
                                                <button class="btn btn-danger btn-sm" title="{{$technician->rejectmessage}}">Rejected</button>
                                            @endif    
                                            </td>
                                        </tr>

                                    @endforeach
                                </table>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    

{{-- requested modal --}}
@if ($technicians->isNotEmpty())
<div class="modal fade" id="RequestedModal" tabindex="-1" aria-labelledby="RequestedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="approvalForm" method="get">
                @csrf 
                <div class="modal-header">
                    <h5 class="modal-title" id="RequestedModalLabel">Approve/Reject: {{$technician->fullname}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Choose whether to approve or reject the request:<br><br>
                    <input type="radio" name="action" value="approve" class="mr-2" id="radioApprove">
                    <label for="radioApprove">Approve Request</label><br>
                    <input type="radio" name="action" value="reject" class="mr-2" id="radioReject">
                    <label for="radioReject">Reject Request</label>
            
                    <div class="mt-3" id="rejectReason" style="display: none;">
                        <textarea class="form-control" rows="3" name="rejectmessage" placeholder="Enter rejection reason" id="rejectReasonInput"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="approve-btn" class="btn btn-primary" id="modalConfirmButton">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

<script>    
        $(document).ready(function () {
            $('.btn-request').click(function () {
                var technicianId = $(this).data('request-id');
                var technicianName = $(this).closest('tr').find('td:nth-child(3)').text(); // Get technician's name from the third column
                $('#RequestedModal').find('.modal-title').text("Approve/Reject: " + technicianName);
                $('#RequestedModal').modal('show');
                $('#approvalForm').data('request-id', technicianId); // Store technician ID
            });


                $('input[name="action"]').on('change', function () {
                    if ($(this).val() === 'reject') {
                        $('#rejectReason').show();
                    } else {
                        $('#rejectReason').hide();
                    }
                });

                $('#approvalForm').on('submit', function (event) {
                    
                    
                    // Clear the form action
                    var requestId = $('#approvalForm').data('request-id');
                    var rejectReason = $('#rejectReasonInput').val();
                    if ($('#radioReject').is(':checked')) {
                        var rejectUrl = "{{ route('technician.reject', '') }}/" + requestId;
                        $('#approvalForm').attr('action', rejectUrl);
                        if(!rejectReason){
                        alert('Please provide a rejection reason.');
                        event.preventDefault(); // Prevent form submission if rejection reason is not provided
                        }
                    }
                    else{
                        var approveUrl = "{{ route('technician.approve', '') }}/" + requestId;
                        $('#approvalForm').attr('action', approveUrl); 
                    }
            
                });
            });

</script>
@endsection
