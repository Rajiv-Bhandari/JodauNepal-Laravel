<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'street',
        'state',
        'city',
        'country',
        'contact_number',
        'alt_contact_number',
        'contact_name',
        'address_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
