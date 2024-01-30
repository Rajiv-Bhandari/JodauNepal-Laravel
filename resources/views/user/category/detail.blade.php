<!-- user.category.detail.blade.php -->

@extends('userlayouts.admin')

@section('content')
<style>
    .detail-container {
        margin-top: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }

    .profile-image {
        width: 300px;
        height: 350px;
        object-fit: cover; /* Ensure the image covers the square without distortion */
        margin-right: 20px;
    }

    .details-container {
        flex-grow: 1;
    }

    .detail-section {
        margin-bottom: 20px;
    }

    .detail-section h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .detail-section p {
        font-size: 1.2em;
        margin: 0;
    }

    .back-btn {
    position: absolute;
    top: 70px; /* Adjust the top spacing as needed */
    right: 10px; /* Adjust the right spacing as needed */
    }
</style>

<h2>Technician Detail</h2>

<div class="detail-container">
    <div class="image-container">
        @if($technician->profilepic)
        <img src="/images/profile_pictures/{{ $technician->profilepic }}" alt="Profile" class="profile-image">
        @else
        <img src="/images/profile_pictures/default.jpg" alt="Profile" class="profile-image">
        @endif
    </div>
    <div class="details-container">
        <div class="detail-section">
            <h3>{{ $technician->fullname }}</h3>
        </div>

        <div class="detail-section">
            <p>Contact Number: {{ $technician->contactnumber }}</p>
        </div>

        <div class="detail-section">
            <p>Address: {{ $technician->address }}</p>
        </div>

        <div class="detail-section">
            <p>Email: {{ $technician->email }}</p>
        </div>

        <div class="detail-section">
            <p>Years of Experience: {{ $technician->yearsofexperience }}</p>
        </div>

        <div class="detail-section">
            <p>Age: {{ now()->diffInYears($technician->dob) }}</p>
        </div>

        <div class="detail-section">
            <p>Total Jobs: {{ $technician->totaljobs }}</p>
        </div>

        <!-- Add more details as needed -->

        <div class="detail-section back-btn">
            <a href="{{ route('user.category', ['category' => $technician->skill_id]) }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
