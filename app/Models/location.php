<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $fillable = [
        'district',
        'PhysicalAddress',
        'longitude',
        'latitude',        
        'region',
        'country',
        'mainlanguage',
        'facebookhandle',
        'instagramhandle'        
        ];


    public function business()
    {
        return $this->belongsto(business::class);
    }
}
