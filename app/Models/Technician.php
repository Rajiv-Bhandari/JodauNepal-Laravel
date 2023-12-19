<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    protected $table = 'technicians';

    protected $fillable = [
        'fullname',
        'contactnumber',
        'address',
        'email',
        'skill',
        'yearsofexperience',
        'dob',
        'totaljobs',
        'profilepic',
        'user_id',
        'status'
    ];

    protected $casts = [
        'dob' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

