<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paymentdetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'payment_method',
        'card_number',
        'expirydate',
        'ussdMNO',
        'ussdmobilenumber',
        'delivery_address',
        'phone_number',
        'email',
    ];    
}
