<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'image_path',
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

    public function user()
    {
        return $this->belongsto(User::class);
    }    
}
