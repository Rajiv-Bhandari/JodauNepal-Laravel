@extends('userlayouts.admin')

@section('content')
    <!-- <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Congratulations! Booking Successful</h2>
                
                <p>Your booking has been successfully submitted.</p>

                <p>Your Booking Code: <strong>{{ $booking->booking_code }}</strong></p>

                <p>Scheduled for:
                    {{ \App\Enums\DayOfWeek::getDescription($booking->technicianTimeslot->day) }},
                    {{ \Carbon\Carbon::parse($booking->technicianTimeslot->start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($booking->technicianTimeslot->end_time)->format('H:i') }}
                </p>

                <p>Booked Date: {{ $booking->date_time->format('Y-m-d, H:i') }}</p>

                <p>Status: {{ \App\Enums\BookingStatus::getDescription($booking->status) }}</p>

                <p>Problem Statement: {{ $booking->problem_statement }}</p>

                <div class="mt-3">
                    <a href="{{ route('user.booking') }}" class="btn btn-primary">View Bookings</a>
                </div>
            </div>
        </div>
    </div> -->

    <div style="text-align: center; margin-top: 20px;">
    <h1 style="font-size: 30px; color: #CA1515; font-family: 'Cookie', cursive; padding-top: 150px;">CONGRATULATIONS YOUR BOOKING IS SUCCESSFUL!</h1>
    <p style="font-size: 24px; color: #333; padding-top: 40px;">This is your Booking ID: <span style="font-weight: bold; color: #CA1515;">{{$booking->booking_code}}</span></p>
    <a href="{{route('user.booking')}}" class="btn btn-primary" style="font-size: 20px; margin-top: 20px; margin-bottom: 20px;">View Your Bookings</a>
</div>
@endsection
