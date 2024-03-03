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
                                        <th>Sceduled For</th>
                                        <th>Booking Id</th>
                                        <th>Technician Name</th>
                                      
                                        <th>Booked Date</th>
                                      
                                        <th>Cost (Rs)</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td><i class="mdi mdi-clock-outline menu-icon"></i>
                                            {{$booking->booked_for}}, 
                                            {{ \App\Enums\DayOfWeek::getDescription($booking->technicianTimeslot->day) }},
                                            {{ \Carbon\Carbon::parse($booking->technicianTimeslot->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($booking->technicianTimeslot->end_time)->format('H:i') }}
                                        </td>
                                        <td>#{{$booking->booking_code}}</td>
                                        <td>{{ $booking->technician->fullname }}</td>
                                        
                                        <td>{{ $booking->date_time->format('Y-m-d, H:i') }}</td>
                                        
                                        <td>{{ $booking->total_cost ?? 0 }}</td>
                                        <td>{{ \App\Enums\BookingStatus::getDescription($booking->status) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('user.bookings.details', ['id' => $booking->id]) }}">
                                                <i class="mdi mdi-information-outline menu-icon icon-md" title="Details"></i>
                                            </a>
                                        </td>
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
