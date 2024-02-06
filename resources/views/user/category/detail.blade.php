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

    .timeslot-section {
        margin-top: 20px;
    }

    .timeslot-section h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .select-label {
        display: block;
        margin-bottom: 5px;
        font-size: 1.1em;
    }

    .select-dropdown {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .select-dropdown:hover {
        border-color: #333;
    }

    .select-dropdown:focus {
        outline: none;
        border-color: #4CAF50;
        box-shadow: 0 0 8px rgba(0, 128, 0, 0.6);
    }

    .no-timeslots {
        font-size: 1.2em;
        margin: 0;
        color: #777;
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
<div class="detail-section timeslot-section">
        <h3>Availability</h3>
        @if($technician->timeslots->isEmpty())
            <p class="no-timeslots">No timeslots available.</p>
        @else
            <label for="daySelect" class="select-label">Select Day:</label>
            <select id="daySelect" class="select-dropdown">
                @foreach (\App\Enums\DayOfWeek::asAssociativeArray() as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>

            <label for="timeSelect" class="select-label">Select Time:</label>
            <select id="timeSelect" class="select-dropdown">
                <!-- Timeslots for the first day will be preloaded -->
                @foreach ($technician->timeslots->where('day', key(\App\Enums\DayOfWeek::asAssociativeArray())) as $timeslot)
                    <option value="{{ $timeslot->start_time }} - {{ $timeslot->end_time }}">
                        {{ $timeslot->start_time }} - {{ $timeslot->end_time }}
                    </option>
                @endforeach
            </select>
        @endif
</div>
@include('user.category.address')
<script>
    // JavaScript to handle the dynamic update of timeslots based on the selected day
    document.getElementById('daySelect').addEventListener('change', function() {
    // Get the selected day
    var selectedDay = this.value;

    // Clear existing options in the timeslots dropdown
    var timeSelect = document.getElementById('timeSelect');
    timeSelect.innerHTML = '';

    // Populate timeslots for the selected day
    @foreach (\App\Enums\DayOfWeek::asAssociativeArray() as $value => $label)
        @foreach ($technician->timeslots->where('day', $value) as $timeslot)
            if (selectedDay === '{{ $value }}') {
                var option = document.createElement('option');
                option.value = '{{ $timeslot->start_time }} - {{ $timeslot->end_time }}';
                option.text = '{{ $timeslot->start_time }} - {{ $timeslot->end_time }}';
                timeSelect.add(option);
            }
        @endforeach
    @endforeach
    });
</script>
@endsection