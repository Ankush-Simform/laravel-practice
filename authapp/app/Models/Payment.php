<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

        'user_id',

        'name',
        'email',
        'phone',

        'payment_method',

        'card_number',
        'cvv',

        'upi_id',

        'is_company',
        'company_name',
        'gst_number',

        'address',
        'city',
        'state',

        'coupon'
    ];
}