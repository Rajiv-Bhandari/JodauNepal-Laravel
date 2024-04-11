@extends('extends.main')
@section('title', 'Report')
@section('content')

    <div class="content">
        <section class="content-header">
            
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card p-2">
                            <div class="card-body col-md-12">
                                <div class="card-header text-bold">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            Filtered Data:
                                        </div>
                                        <div class="text-right" style="margin-right: 10px;">
                                            @if($selectedStatus)
                                                Status - {{ App\Enums\BookingStatus::getDescription((int)$selectedStatus) }},
                                            @else
                                                Status - All,
                                            @endif
                                            <span style="margin-left: 15px;">Technician: {{ $selectedTechnicianName ? $selectedTechnicianName : 'All' }}</span>
                                            <button id="exportPdfButton" class="btn btn-dark" style="margin-left:20px;">Export PDF</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 py-1" style="clear:both;">&nbsp;</div>
                                <div class="table-responsive">
                                    <table class="datatable table">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Booking Code</th>
                                                <th>User</th>
                                                @if(!isset($selectedTechnician))
                                                    <th>Technician</th>
                                                @endif
                                                <th>Booked At</th>
                                                <th>Sceduled For</th>
                                                <th>Cost</th>
                                                <th>Problem Statement</th>
                                                @if(!isset($selectedStatus))
                                                    <th>Status</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bookings as $booking)
                                                <tr>
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $booking->booking_code }}</td>
                                                    <td>{{ $booking->userName }}</td>
                                                    @if(!isset($selectedTechnician))
                                                        <td>{{ $booking->technicianName }}</td>
                                                    @endif
                                                    <td>{{ $booking->date_time }}</td>
                                                    <td>{{ $booking->date }}, {{ substr($booking->start_time, 0, -3) }} - {{ substr($booking->end_time, 0, -3) }}</td>
                                                    <td>{{ $booking->total_cost }}</td>
                                                    <td>{{ $booking->problem_statement }}</td>
                                                    @if(!isset($selectedStatus))
                                                        <td>{{ App\Enums\BookingStatus::getDescription($booking->status) }}</td>
                                                    @endif
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
        </section>
    </div>

<script>
    document.getElementById('exportPdfButton').addEventListener('click', function() {
        // Get the selected status or technician
        var selectedStatus = {!! json_encode($selectedStatus) !!};
        var selectedTechnicianName = {!! json_encode($selectedTechnicianName) !!};
        
        // Set the title based on the selected status or technician
        var title = 'bookingreport-';
        if (!selectedStatus && !selectedTechnicianName) {
            title = 'All-Status:All-Technician';
        } else {
            title += selectedStatus ? 'Status:' + selectedStatus : 'All-Status';
            title += '-';
            title += selectedTechnicianName ? 'Technician:' + selectedTechnicianName : 'All-Technician';
        }
        document.title = title;
        
        window.print();
    });
</script>

@endsection
