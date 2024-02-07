<?php

// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\BookingStatus;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    protected $fillable = [
        'booking_code',
        'user_id',
        'technician_id',
        'address_id',
        'technician_timeslot_id',
        'date_time',
        'status',
        'total_cost',
        'problem_statement',
    ];

    protected $casts = [
        'date_time' => 'datetime',
       
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function technicianTimeslot()
    {
        return $this->belongsTo(TechnicianTimeslot::class);
    }
}

