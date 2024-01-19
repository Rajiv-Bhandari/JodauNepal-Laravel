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
        'skill_id',
        'yearsofexperience',
        'dob',
        'totaljobs',
        'profilepic',
        'user_id',
        'status',
        'rejectmessage'
    ];

    protected $casts = [
        'dob' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function skill()
    {
        return $this->belongsTo(Category::class, 'skill_id');
    }

}

