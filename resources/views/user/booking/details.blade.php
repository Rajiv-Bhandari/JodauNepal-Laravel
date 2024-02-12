<!-- user.category.detail.blade.php -->

@extends('userlayouts.admin')

@section('content')

<style>
    .technician-details {
        display: flex;
        margin-bottom: 12px;
        border: 1px solid #ddd;
        padding: 10px;
        background-color: white; 
    }

    .details {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        padding-left: 10px;
    }

    .details-top {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }

    h3 {
        margin-bottom: 5px;
    }

    .experience, .jobscompleted, .address, .contact, .age {
        margin-bottom: 5px;
    }

    .technician-link {
        text-decoration: none;
        color: #333;
        transition: background-color 0.3s;
    }

    .technician-link:hover {
        background-color: #f0f0f0;
        color: #1a1a1a; 
        text-decoration: none; 
        font-weight: bold;
    }
</style>
<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2 style="margin-bottom: 20px; margin-top: 15px; color: #333; font-size: 24px; font-weight: bold;">
        Booking Details
    </h2>

    @if($booking->status != \App\Enums\BookingStatus::Completed && $booking->status != \App\Enums\BookingStatus::Cancelled)
        <a href="{{ route('user.booking.cancel', ['id' => $booking->id]) }}" class="btn btn-danger">Cancel</a>
    @endif
</div>

<div class="technicians-list">
   
    
        <div class="technician-details">
            
            <div class="details">
                <div class="details-top">
                    <h3>Booking Id: {{ $booking->booking_code }}</h3>
                    <p class="experience"><b>Status: {{ \App\Enums\BookingStatus::getDescription($booking->status) }}</b></p>
                </div>
                <p class="address"><i class="mdi mdi-clock-outline menu-icon"></i> Scheduled for:
                    {{ \App\Enums\DayOfWeek::getDescription($booking->technicianTimeslot->day) }},
                    {{ \Carbon\Carbon::parse($booking->technicianTimeslot->start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($booking->technicianTimeslot->end_time)->format('H:i') }}
                <div class="details-bottom">
                    <p class="contact">Booked Date: {{ $booking->date_time->format('Y-m-d, H:i') }}</p>
                    <p class="age"> Problem Statement: {{ $booking->problem_statement }}</p>
                    <p class="age"> Total Cost: {{ $booking->total_cost ?? "-" }}</p>
                </div>
            </div>
        </div>
    
    
</div>


<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="d-flex align-items-center">
                    <img src="{{ $booking->technician->profilepic ? '/images/profile_pictures/'.$booking->technician->profilepic : '/images/profile_pictures/default.jpg' }}"
                        alt="Profile" class="card-img-top rounded-circle" style="width: 75px; height: 75px; object-fit: cover;margin-left:15px">
                    <div class="card-body ml-3">
                        <h3 class="card-title">Technician Details</h3>
                        <p class="card-text">
                            {{ $booking->technician->fullname }} <br>
                            Contact Number: {{ $booking->technician->contactnumber }}<br>
                            Address: {{ $booking->technician->address }}<br>
                            {{ $booking->technician->email }}<br>
                            Years of Experience: {{ $booking->technician->yearsofexperience }}<br>
                            Age: {{ now()->diffInYears($booking->technician->dob) }}<br>
                            Total Jobs: {{ $booking->technician->totaljobs }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Your Address</h4>
                    <p class="card-text">
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




@endsection
