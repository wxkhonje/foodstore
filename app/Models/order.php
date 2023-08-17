<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'menuid',
        'specialinstructions',
        'quantity',
        'customerid',
        'cost'
    ];

    public function cart()
    {
        return $this->hasMany(cart::class);
    }    
}
