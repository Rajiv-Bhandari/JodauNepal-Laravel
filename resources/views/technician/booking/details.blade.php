@extends('technicianlayout.main')
@section('title', 'Booking Details')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-4 text-dark font-weight-bold">Booking Details</h2>

                <div class="ml-auto">
                    @if($booking->status == \App\Enums\BookingStatus::Pending)
                        <a href="{{ route('technician.booking.confirm', ['id' => $booking->id]) }}" class="btn btn-info mr-2">Confirm</a>
                    @endif

                    @if($booking->status != \App\Enums\BookingStatus::Completed && $booking->status != \App\Enums\BookingStatus::Cancelled)
                        <a href="{{ route('technician.booking.cancel', ['id' => $booking->id]) }}" class="btn btn-danger">Cancel</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body table-responsive p-2">
            <div class="card">
                <div class="card-body">
                    <div class="technicians-list">
                        <div class="technician-details">
                            <div class="details d-flex justify-content-between">
                                <div>
                                    <div class="details-top">
                                        <h3>Booking Id: {{ $booking->booking_code }}</h3>
                                    </div>
                                    <p class="address"><i class="fas fa-clock fa-lg"></i> Scheduled for:
                                        {{$booking->booked_for}},
                                        {{ \App\Enums\DayOfWeek::getDescription($booking->technicianTimeslot->day) }},
                                        {{ \Carbon\Carbon::parse($booking->technicianTimeslot->start_time)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($booking->technicianTimeslot->end_time)->format('H:i') }}
                                    </p>
                                    <div class="details-bottom">
                                        <p class="contact">Booked Date: {{ $booking->date_time->format('Y-m-d, H:i') }}</p>
                                        <p class="age"> Problem statement: {{ $booking->problem_statement }}</p>
                                        <p class="cost"> Total Cost: {{ $booking->total_cost ?? "-" }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="experience"><b>Status: {{ \App\Enums\BookingStatus::getDescription($booking->status) }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content-header -->

    <div class="card-body table-responsive p-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex align-items-center">
                        
                        <div class="card-body ml-3">
                            <h3 class="card-title"> <b> Client Details </b></h3>
                            <p class="card-text"><br>
                                Name: {{ $booking->user->name }} <br>
                                Contact Number: {{ $booking->user->contactno }}<br>
                                Address: {{ $booking->user->address }}<br>
                                {{ $booking->user->email }}<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><b>Client Address </b></h4>
                        <p class="card-text"><br>
                            {{ $booking->address->address_name }}<br>
                            {{ $booking->address->country }}, {{ $booking->address->state }}, {{ $booking->address->city }}<br>
                            Street: {{ $booking->address->street }}<br>
                            {{ $booking->address->contact_name }}, {{ $booking->address->contact_number }}<br>
                            @if (!empty($booking->address->alt_contact_number))
                                Alternative Contact Number: {{ $booking->address->alt_contact_number }}
                            @else
                                No Alternative Contact Number
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
