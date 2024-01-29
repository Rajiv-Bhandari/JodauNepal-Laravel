@extends('userlayouts.admin')

@section('content')
    <h2>Technicians</h2>

    <div class="technicians-list">
        @foreach ($technicians as $technician)
            <div class="technician-details">
                @if($technician->profilepic)
                    <img src = "/images/profile_pictures/{{$technician->profilepic}}" alt="Profile" style="width:65px; height:65px; float:left; border-radius:50%; margin-right:5px;">
                @else
                    <img src = "/images/profile_pictures/default.jpg" alt="Profile" style="width:65px; height:65px; float:left; border-radius:50%; margin-right:5px;">
                @endif
                <div class="details">
                    <h3>{{ $technician->fullname }}</h3>
                    <p>Contact Number: {{ $technician->contactnumber }}</p>
                    <p>Address: {{ $technician->address }}</p>
                    <p>Email: {{ $technician->email }}</p>
                    <p>Years of Experience: {{ $technician->yearsofexperience }}</p>
                    <p>Age: {{ now()->diffInYears($technician->dob) }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
