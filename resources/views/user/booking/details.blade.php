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
    /* rating */
    .rating {
    display: flex;
    align-items: center;
    }

    .stars-container {
        display: flex;
        justify-content: space-between; /* Distribute stars evenly */
    }

    .star-label {
        cursor: pointer;
        transition: color 0.3s;
    }

    .star-label:hover,
    .rated {
        color: gold; /* Or your preferred color */
    }

</style>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2 style="margin-bottom: 20px; margin-top: 15px; color: #333; font-size: 24px; font-weight: bold;">
        Booking Details
    </h2>

    @if($booking->status != \App\Enums\BookingStatus::Completed && $booking->status != \App\Enums\BookingStatus::Cancelled)
        <div style="text-align: right;">
            <a href="{{ route('user.booking.cancel', ['id' => $booking->id]) }}" class="btn btn-danger" style="margin-right:10px;">Cancel</a>
            @if($booking->advance == 0)
                <button id="payment-button" style="background-color: purple; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Pay with Khalti</button>
            @endif
        </div>
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
                    {{ $booking->technicianTimeslot->date }},
                    {{ \Carbon\Carbon::parse($booking->technicianTimeslot->start_time)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($booking->technicianTimeslot->end_time)->format('H:i') }}
                <div class="details-bottom">
                    <p class="contact">Booked Date: {{ $booking->date_time->format('Y-m-d, H:i') }}</p>
                    <p class="age"> Problem Statement: {{ $booking->problem_statement }}</p>
                    <p class="age"> Advance: {{ $booking->advance ?? "-" }}</p>
                    <p class="age"> Total Cost: {{ $booking->total_cost ?? "-" }}</p>
                </div>
            </div>
        </div>
    
    
</div>


<div class="card-body table-responsive p-2">
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

@if($booking->status == \App\Enums\BookingStatus::Completed)
    <h2 style="margin-bottom: 20px; margin-top: 15px; margin-left:5px; color: #333; font-size: 24px; font-weight: bold;">
        Rate
    </h2>
    <div class="rating" style="margin-left:5px; ">
        
        <form action="{{ route('user.booking.rate', ['id' => $booking->id]) }}" method="post">
            @csrf
            <div class="stars-container">
                @for($i = 1; $i <= 5; $i++)
                    <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ $i == $booking->rating ? 'checked' : '' }} style="display: none;">
                    <label for="star{{ $i }}" class="star-label" data-rating="{{ $i }}">
                        <i class="mdi mdi-star {{ $i <= $booking->rating ? 'rated' : '' }}"></i>
                    </label>
                @endfor
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit Rating</button>
        </form>
    </div>
@endif


<script>
    document.addEventListener('DOMContentLoaded', function () {
    const stars = document.querySelectorAll('.star-label');

    stars.forEach(star => {
        star.addEventListener('click', function () {
            const rating = this.dataset.rating;

            // Update stars based on previously selected rating
            stars.forEach(s => {
                s.classList.remove('rated');
                if (s.dataset.rating <= rating && s.dataset.rating >= {{$booking->rating}}) {
                    s.classList.add('rated');
                }
            });

            // Update hidden radio input value
            document.querySelector('input[name="rating"]').value = rating;
        });
    });
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
    var config = {
        "publicKey": "test_public_key_850bbcc5a5074adb8c92a79e5bf21dc8",
        "productIdentity": "1234567890",
        "productName": "Dragon",
        "productUrl": "http://127.0.0.1:8000/user/booking/1/details",
        "paymentPreference": [
            "KHALTI",
            "EBANKING",
            "MOBILE_BANKING",
            "CONNECT_IPS",
            "SCT",
        ],
        "eventHandler": {
            onSuccess (payload) {
                console.log("inside success function");
                console.log(payload);

                // Send payload data to PaymentController using AJAX
                $.ajax({
                    type: 'POST',
                    url: '/khaltipayment',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'payload': payload,
                        'technician_id': {{ $booking->technician->id }},
                        'booking_id' : {{ $booking->id }}
                    },
                    success: function(response) {
                        console.log('Payment data sent to PaymentController.');
                        // window.location.href = '{{ route("khalti.verified") }}';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error sending payment data:', error);
                    }
                });
            },
            onError (error) {
                console.log(error);
            },
            onClose () {
                console.log('widget is closing');
            }
        }
    };

    var checkout = new KhaltiCheckout(config);
    var btn = document.getElementById("payment-button");
    btn.onclick = function () {
        checkout.show({amount: 1000});
    }
</script>


@endsection
