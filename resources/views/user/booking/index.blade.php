@extends('userlayouts.admin')
@section('title', 'Booking')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Bookings</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="bookingTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Technician</th>
                                        <th>Address</th>
                                        <th>Time</th>
                                        <th>Booked Date</th>
                                        <th>Status</th>
                                        <th>Problem Statement</th>
                                        <th>Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $booking->technician->fullname }}</td>
                                        <td>{{ $booking->address->address_name }}</td>
                                        <td>
                                            {{ \App\Enums\DayOfWeek::getDescription($booking->technicianTimeslot->day) }},
                                            {{ $booking->technicianTimeslot->start_time }} -
                                            {{ $booking->technicianTimeslot->end_time }}
                                        </td>
                                        <td>{{ $booking->date_time->format('Y-m-d H:i') }}</td>
                                        <td>{{ \App\Enums\BookingStatus::getDescription($booking->status) }}</td>
                                        <td>{{ $booking->problem_statement }}</td>
                                        <td>{{ $booking->total_cost }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>



@endsection
