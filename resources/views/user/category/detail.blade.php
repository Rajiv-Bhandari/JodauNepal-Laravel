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

    .problem-statement-section {
        margin-top: 20px;
    }

    .problem-statement-section h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .problem-statement-textarea {
        width: 100%;
        height: 100px;
        padding: 8px;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 10px;
    }

    .book-btn {
        text-align: left;
    }
    #bookButton:disabled {
        opacity: 0.6; /* Adjust the opacity to your liking */
        cursor: not-allowed;
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
        <label for="daySelect" class="select-label">Select Date:</label>
        <select id="daySelect" class="select-dropdown">
            <option value="" selected disabled>Select Date</option>
        </select>

        <label for="timeSelect" class="select-label">Select Time:</label>
        <select id="timeSelect" class="select-dropdown">
            <option value="" selected disabled>Select Time</option>
        </select>
    @endif
    @if ($errors->has('technician_timeslot_id'))
        <x-validation-errors>
            {{ $errors->first('technician_timeslot_id') }}
        </x-validation-errors>
    @endif
</div>

@include('user.category.address')


<form method="post" action="{{ route('booking.store') }}">
    @csrf
    <!-- Hidden input fields -->
    <input type="hidden" name="user_id" value="{{ $profile->id }}">
    <input type="hidden" name="technician_id" value="{{ $technician->id }}">
    <input type="hidden" name="address_id" id="selectedAddressId" value="{{ $selectedAddressId }}">
    <input type="hidden" name="technician_timeslot_id" id="selectedTimeslotId" value="">

    <div class="detail-section problem-statement-section">
        <h3>Problem Statement</h3>
        <textarea name="problem_statement" class="problem-statement-textarea" placeholder="Describe your problem..." required></textarea>
    </div>
    @if($technician->timeslots->isEmpty())
        <div class="detail-section book-btn">
            <button type="button" class="btn btn-danger" id="bookButton" disabled>Book</button>
        </div>
    @else
        <!-- Book button section -->
        <div class="detail-section book-btn">
            <button type="submit" class="btn btn-primary">Book</button>
        </div>
    @endif
</form>

@include('user.category.comments')

<!-- Update the JavaScript to automatically set the day when a date is selected -->
<script>
    // Function to get unique dates from an array of timeslots
    function getUniqueDates(timeslots) {
        return [...new Set(timeslots.map(timeslot => timeslot.date))];
    }

    // Function to populate the date dropdown
    function populateDateDropdown() {
        var daySelect = document.getElementById('daySelect');
        var timeSelect = document.getElementById('timeSelect');
        
        // Clear existing options
        daySelect.innerHTML = '';
        timeSelect.innerHTML = '';

        // Add the default option for date
        var defaultDateOption = document.createElement('option');
        defaultDateOption.value = "";
        defaultDateOption.text = "Select Date";
        defaultDateOption.disabled = true;
        defaultDateOption.selected = true;
        daySelect.add(defaultDateOption);

        // Get unique dates from technician's timeslots
        var uniqueDates = getUniqueDates(@json($technician->timeslots->toArray()));

        // Add each unique date to the dropdown
        uniqueDates.forEach(function (date) {
            var option = document.createElement('option');
            option.value = date;
            option.text = date;
            daySelect.add(option);
        });
    }

    // Function to load timeslots based on the selected date
    // Function to load timeslots based on the selected date
    function loadTimeSlots() {
        var daySelect = document.getElementById('daySelect');
        var timeSelect = document.getElementById('timeSelect');

        // Clear existing options
        timeSelect.innerHTML = '';

        // Retrieve selected date from the dropdown
        var selectedDate = daySelect.value;

        // Filter timeslots for the selected date and not booked
        var availableTimeslots = @json($technician->timeslots->toArray());

        // Add the default option for time
        var defaultTimeOption = document.createElement('option');
        defaultTimeOption.value = "";
        defaultTimeOption.text = "Select Time";
        defaultTimeOption.disabled = true;
        defaultTimeOption.selected = true;
        timeSelect.add(defaultTimeOption);

        // Add available times for the selected date to the dropdown
        availableTimeslots.forEach(function (timeslot) {
            if (timeslot.date === selectedDate && !timeslot.isBooked) {
                var option = document.createElement('option');
                option.value = timeslot.id;
                option.text = timeslot.start_time + ' - ' + timeslot.end_time;
                timeSelect.add(option);
            }
        });
    }


    // Event listener for date dropdown change
    document.getElementById('daySelect').addEventListener('change', function () {
        // Call the function to load timeslots based on the selected date
        loadTimeSlots();
    });
    document.getElementById('timeSelect').addEventListener('change', function() {
        var selectedTimeslotId = this.value;
        document.getElementById('selectedTimeslotId').value = selectedTimeslotId;
    });

    // Call the function to populate the date dropdown initially
    populateDateDropdown();

</script>

<!-- JavaScript to handle showing/hiding the address form and highlighting selected address -->
<script>
    // Get the elements
    var addAddressBtn = document.getElementById('addAddressBtn');
    var addressForm = document.getElementById('addressForm');
    var addressItemContainers = document.querySelectorAll('.address-item-container');

    // Show the address form when the "Add New" button is clicked
    addAddressBtn.addEventListener('click', function () {
        addressForm.style.display = 'block';
    });

    // Hide the address form when the "Close" button is clicked
    closeAddressFormBtn.addEventListener('click', function () {
        addressForm.style.display = 'none';
    });

    // Highlight the clicked address and store its ID in the hidden field
    addressItemContainers.forEach(function (container) {
        container.addEventListener('click', function () {
            // Remove the "selected-address" class from all containers
            addressItemContainers.forEach(function (c) {
                c.classList.remove('selected-address');
            });

            // Add the "selected-address" class to the clicked container
            container.classList.add('selected-address');

            // Get the selected address ID and set it in the hidden field
            var selectedAddressId = container.dataset.addressId;
            console.log('Selected Address ID:', selectedAddressId);

            // Set the selected address ID in the hidden field
            document.getElementById('selectedAddressId').value = selectedAddressId;
        });
    });

    function confirmDelete(addressId) {
        if (confirm('Are you sure you want to delete this address?')) {
            // Submit the corresponding delete form
            document.getElementById('deleteForm' + addressId).submit();
        }
    }
</script>

@endsection