<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\categorie;
use App\Models\Businessaddress;
use Laravel\Scout\Searchable;

class Business extends Model
{
    use HasFactory;
    use Searchable;

    public function searchableAs()
    {
        return 'business';
    }    

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description
        ];
    }    

    protected $fillable = [
        'name',
        'user_id',
        'category_id',
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
    public function businessAddress()
    {
        return $this->hasOne(Businessaddress::class);
    }

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }

    public function businesstype()
    {
        return $this->hasOne(businesstype::class);
    }

    public function category()
    {
        return $this->belongsto(categorie::class);
    }

    public function user()
    {
        return $this->belongsto(User::class);
    }    
}
