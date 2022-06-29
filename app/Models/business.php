<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'contactperson',
        'email',
        'cellnumber'
    ];

    public function location()
    {
        return $this->hasOne(location::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function businesstype()
    {
        return $this->hasOne(businesstype::class);
    }
}
