<?php

namespace App\Models;

use App\Models\categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',   
        'price',
        'category_id'    
        ];

        public function category()
        {
            return $this->belongsto(categorie::class);
        }

}