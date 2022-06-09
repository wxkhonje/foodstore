<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'location',
        'PhysicalAddress',
        'longitude',
        'latitude',
        'contactperson',
        'email',
        'cellnumber',
        'facebookhandle',
        'instagramhandle'
    ];
}
