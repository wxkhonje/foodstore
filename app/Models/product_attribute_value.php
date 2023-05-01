<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\attribute;

class product_attribute_value extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'attribute_id',   
        'value'
        ];    

        public function product()
        {
            return $this->belongsto(Product::class);
        }

        public function attribute()
        {
            return $this->belongsto(attribute::class);
        }        
}