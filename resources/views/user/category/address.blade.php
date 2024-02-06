<!-- resources/views/user/profile/address.blade.php -->

<style>
    .address-item-container.selected-address {
        border: 2px solid #007BFF; /* Blue color border */
        border-radius: 5px;
        padding: 10px;
    }

    .address-item-container.selected-address .card-title {
        font-weight: bold; /* Bold text for the selected address */
    }
</style>

<div class="main-container bg-white p-4" style="margin-top:20px;">
    <h4 style="margin-bottom:20px;">Your Address Details</h4>

    <!-- Display existing addresses -->
    <div class="address-list row">
        @foreach ($addresses as $address)
            <div class="col-md-4 address-item-container" data-address-id="{{ $address->id }}">
                <div class="address-item card mb-3">
                    <div class="card-body">
                        <a href="#" class="float-right text-danger" onclick="confirmDelete({{ $address->id }})">
                            <i class="mdi mdi-delete"></i>
                        </a>
                        <form id="deleteForm{{ $address->id }}" action="{{ route('profile.address.delete', ['id' => $address->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
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
        @if($addresses->count() > 0)
            <div class="col-md-4" style="margin-top:60px;">
                <button id="addAddressBtn" class="btn btn-primary">Add New Address</button>
            </div>
        @else
            <div class="col-md-4">
                <button id="addAddressBtn" class="btn btn-primary">Add New Address</button>
            </div>
        @endif
    </div>

    <!-- "Add New" button -->
    <!-- <button id="addAddressBtn" class="btn btn-primary">Add New Address</button> -->
</div>

<!-- Address Form (Initially hidden) -->
<div id="addressForm" style="display: none;">
    @include('user.profile.addressform')
</div>

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

    // Highlight the clicked address and store its ID
    addressItemContainers.forEach(function (container) {
        container.addEventListener('click', function () {
            addressItemContainers.forEach(function (c) {
                c.classList.remove('selected-address');
            });

            container.classList.add('selected-address');

            // Get the selected address ID and store it in a variable or send it to the server as needed
            var selectedAddressId = container.dataset.addressId;
            console.log('Selected Address ID:', selectedAddressId);
        });
    });

    function confirmDelete(addressId) {
        if (confirm('Are you sure you want to delete this address?')) {
            // Submit the corresponding delete form
            document.getElementById('deleteForm' + addressId).submit();
        }
    }
</script>
