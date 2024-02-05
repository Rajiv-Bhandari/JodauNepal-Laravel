<!-- resources/views/user/profile/addressform.blade.php -->

<!-- Address Form -->
<form method="POST" action="#" enctype="multipart/form-data">
    @csrf

    <!-- First Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" required>
            </div>
        </div>
    </div>

    <!-- Second Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="street">Street</label>
                <input type="text" class="form-control" id="street" name="street" required>
            </div>
        </div>
    </div>

    <!-- Third Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="address_name">Address Name</label>
                <select class="form-control" id="address_name" name="address_name" required>
                    <option value="Home">Home</option>
                    <option value="Office">Office</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" required>
            </div>
        </div>
    </div>

    <!-- Fourth Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="alt_contact_number">Alternative Contact Number</label>
                <input type="text" class="form-control" id="alt_contact_number" name="alt_contact_number">
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save Address</button>
        <button type="button" class="btn btn-secondary" id="closeAddressFormBtn">Close</button>
    </div>

</form>
