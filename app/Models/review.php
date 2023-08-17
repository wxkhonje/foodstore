<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'customer_id',
        'product_name',
        'product_description',
        'product_image',
        'rating_value',
        'rating_best',
        'rating_worst',
        'author_name',
        'date_published',
        'review_body',
    ];    

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }    
}
