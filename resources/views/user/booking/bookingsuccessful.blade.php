@extends('userlayouts.admin')

@section('content')

<div style="text-align: center; margin-top: 20px;">
    <h1 style="font-size: 30px; color: #CA1515; font-family: 'Cookie'; margin-top: 150px;">CONGRATULATIONS YOUR BOOKING IS SUCCESSFUL!</h1>
    <p style="font-size: 24px; color: #333; padding-top: 40px;">This is your Booking ID: <span style="font-weight: bold; color: #CA1515;">{{$booking->booking_code}}</span></p>
    <a href="{{route('user.booking')}}" class="btn btn-primary" style="font-size: 20px; margin-top: 20px; margin-bottom: 20px;">View Your Bookings</a>
</div>
@endsection
