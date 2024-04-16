<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhaltiPayment extends Model
{
    use HasFactory;
    protected $table = 'khalti_payment';

    protected $fillable = [
        'amount_in_paisa',
        'idx',
        'mobile',
        'product_identity',
        'product_name',
        'product_url',
        'token',
        'widget_id',
        'paid_by',
        'paid_to',
        'booking_id'
    ];
}
