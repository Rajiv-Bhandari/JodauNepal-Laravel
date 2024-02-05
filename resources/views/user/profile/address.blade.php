<!-- resources/views/user/profile/address.blade.php -->

<h4>Address Details</h4>

<!-- Display existing addresses -->
<div class="address-list">
    @foreach ($addresses as $address)
        <div class="address-item">
            <!-- Display address details here -->
            <p>{{ $address->street }}, {{ $address->city }}, {{ $address->state }}, {{ $address->country }}</p>
            <!-- Add any other address details you want to display -->
        </div>
    @endforeach
</div>

<!-- "Add New" button -->
<button id="addAddressBtn" class="btn btn-primary">Add New Address</button>

<!-- Address Form (Initially hidden) -->
<div id="addressForm" style="display: none;">
    @include('user.profile.addressform')
</div>

<!-- JavaScript to handle showing/hiding the address form -->
<script>
    // Get the elements
    var addAddressBtn = document.getElementById('addAddressBtn');
    var addressForm = document.getElementById('addressForm');

    // Show the address form when the "Add New" button is clicked
    addAddressBtn.addEventListener('click', function () {
        addressForm.style.display = 'block';
    });

    // Hide the address form when the "Close" button is clicked
    closeAddressFormBtn.addEventListener('click', function () {
        addressForm.style.display = 'none';
    });
</script>
