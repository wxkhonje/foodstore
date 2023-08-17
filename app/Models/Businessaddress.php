<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businessaddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'PostAddress',
        'PhysicalAddress',
        'longitude',
        'latitude',
        'region',
        'district',
        'country',
        'mainlanguage',
        'Street',
        'googlepin',
        'instagramhandle',
        'facebookhandle'
    ];

    public function business()
    {
        return $this->belongsto(Business::class);
    }    
}
