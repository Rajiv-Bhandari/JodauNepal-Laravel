<!-- resources/views/technician/booking/index.blade.php -->

@extends('technicianlayout.main')
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
                                        <th>Scheduled For</th>
                                        <th>Booking Id</th>
                                        <th>User Name</th>
                                        <th>Booked Date</th>
                                        <th>Cost (Rs)</th>
                                        <th>Status</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td><i class="far fa-clock"></i>
                                            {{ \App\Enums\DayOfWeek::getDescription($booking->technicianTimeslot->day) }},
                                            {{ \Carbon\Carbon::parse($booking->technicianTimeslot->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($booking->technicianTimeslot->end_time)->format('H:i') }}
                                        </td>
                                        <td>#{{$booking->booking_code}}</td>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->date_time->format('Y-m-d, H:i') }}</td>
                                        <td>{{ $booking->total_cost ?? 0 }}</td>
                                        <td>
                                            @if($booking->status != \App\Enums\BookingStatus::Confirmed)
                                                {{ \App\Enums\BookingStatus::getDescription($booking->status) }}
                                            @else
                                                <button class="btn btn-warning btn-sm btn-request" data-toggle="modal" data-target="#cancelRequestModal" data-request-id="{{ $booking->id }}">Confirmed</button>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('technician.bookings.details', ['id' => $booking->id]) }}">
                                                <i class="fas fa-info-circle fa-lg" title="Details"></i>
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

<!--  cancel Modal -->
<div class="modal fade" id="cancelRequestModal" tabindex="-1" aria-labelledby="cancelRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelRequestModalLabel">Completed Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('technician.booking.complete', 'replace_id') }}" method="post">
                @csrf <!-- Add the CSRF token for security -->
                <div class="modal-body">
                    <label for="totalamount">Enter total amount for this booking:</label>
                    <input type="number" id="totalamount" name="totalamount" class="form-control" required>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if ($bookings->count() > 0)
                        <button type="submit" class="btn btn-danger btn-cancel-request">Completed</button> <!-- Change to submit button -->
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach event listener to the cancel modal show event
        $('#cancelRequestModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var requestId = button.data('request-id');
            var form = $('#cancelRequestModal form');
            var action = form.attr('action').replace('replace_id', requestId);
            form.attr('action', action);
        });
    });
</script>

@endsection
