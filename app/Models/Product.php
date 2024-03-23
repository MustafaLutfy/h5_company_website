<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'store_id',
        'original_price',
        'new_price',
        'send_gift',
        'is_instock',
        'description',
        'description_ar',
    ];

    public function images()
    {
    return $this->hasMany(Image::class, 'product_id');
    }


    public function orders()
    {
        return $this->hasMany(Order::class,'flight_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
