<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ingredients;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','price'
        ];

        public function business()
        {
            return $this->belongsto(business::class);
        }

        public function ingredients()
        {
            return $this->hasMany(ingredients::class);
        }

}
