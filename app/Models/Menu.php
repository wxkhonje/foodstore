<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ingredients;
use Laravel\Scout\Searchable;

class Menu extends Model
{
    use HasFactory;
    use Searchable;

    public function searchableAs()
    {
        return 'Menu';
    }      

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description
        ];
    } 

    protected $fillable = [
        'name','description','price'
        ];

        public function business()
        {
            return $this->belongsto(Business::class);
        }

        public function ingredients()
        {
            return $this->hasMany(ingredients::class);
        }

        public function carts()
        {
            return $this->hasMany(cart::class);
        }

        public function reviews()
        {
            return $this->hasMany(review::class);
        }        

}
