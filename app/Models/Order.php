<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_name',
        'government',
        'address',
        'phone',
        'send_gift',
        'notes',
    ];

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
