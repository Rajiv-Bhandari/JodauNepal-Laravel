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

    .image-container {
        flex: 0 0 75px;
    }

    .profile-image {
        width: 65px;
        height: 65px;
        border-radius: 50%;
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

    .experience, .address, .contact, .age {
        margin-bottom: 5px;
    }
</style>
<h2 style="margin-bottom:20px; color: #333; font-size: 24px; font-weight: bold;">
    Technicians for {{ $category->name }}
</h2>

<div class="technicians-list">
    @foreach ($technicians as $technician)
    <div class="technician-details">
        <div class="image-container">
            @if($technician->profilepic)
            <img src="/images/profile_pictures/{{ $technician->profilepic }}" alt="Profile" class="profile-image">
            @else
            <img src="/images/profile_pictures/default.jpg" alt="Profile" class="profile-image">
            @endif
        </div>
        <div class="details">
            <div class="details-top">
                <h3>{{ $technician->fullname }}</h3>
                <p class="experience">Years of Experience: {{ $technician->yearsofexperience }}</p>
            </div>
            <p class="address">Address: {{ $technician->address }}</p>
            <div class="details-bottom">
                <p class="contact">Contact Number: {{ $technician->contactnumber }}</p>
                <p class="age">Age: {{ now()->diffInYears($technician->dob) }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
