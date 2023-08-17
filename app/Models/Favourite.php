<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'menu_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order that owns the favourite.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Get the menu that is the favourite.
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }    
}
