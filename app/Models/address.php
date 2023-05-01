<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street_address',
        'apartment_suite_number',
        'city',
        'state_province',
        'postal_code',
        'country',
        'delivery_instructions',
        'address_type',
        ];    
}