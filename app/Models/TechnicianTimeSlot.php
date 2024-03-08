<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicianTimeSlot extends Model
{
    use HasFactory;

    protected $table = 'techniciantimeslots';

    protected $fillable = [
        'technician_id',
        'date',
        'start_time',
        'end_time',
        'isBooked',
    ];
}
