<!-- resources/views/user/profile/address.blade.php -->

<div class="main-container bg-white p-4" style="margin-top:20px;">
    <h4>Your Address Details</h4>

    <!-- Display existing addresses -->
    <div class="address-list row">
        @foreach ($addresses as $address)
            <div class="col-md-4">
                <div class="address-item card mb-3">
                    <div class="card-body">
                        <!-- Display address details here in a Bootstrap card -->
                        <h5 class="card-title">{{ $address->address_name }}</h5>
                        <p class="card-text">
                            {{ $address->country }}, {{ $address->state }}, {{ $address->city }}<br>
                        </p>
                        <p class="card-text">
                            Street: {{ $address->street }}
                        </p>
                        <p class="card-text">
                            {{ $address->contact_name }}, {{ $address->contact_number }} <br>
                        </p>
                        <p class="card-text">
                            @if (!empty($address->alt_contact_number))
                                Alternative Contact Number: {{ $address->alt_contact_number }}
                            @else
                                No Alternative Contact Number
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-4" style="margin-top:60px;">
            <button id="addAddressBtn" class="btn btn-primary">Add New Address</button>
        </div>
    </div>

    <!-- "Add New" button -->
    <!-- <button id="addAddressBtn" class="btn btn-primary">Add New Address</button> -->
</div>

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
