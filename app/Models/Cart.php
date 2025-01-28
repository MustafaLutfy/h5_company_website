<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model  {  
        protected $fillable = [  
            'user_id',  
            'status',  
            'session_id',
            'total_amount',
            'name',
            'email',
            'phone',
            'city',
            'address',
            'note',
        ];  
    
        const STATUS_PENDING = 'pending';  
        const STATUS_PROCESSING = 'processing';  
        const STATUS_COMPLETED = 'completed';  
        const STATUS_CANCELLED = 'cancelled';  
    
        // Get all available statuses  
        public static function getStatuses()  
        {  
            return [  
                self::STATUS_PENDING => 'Pending',  
                self::STATUS_PROCESSING => 'Processing',  
                self::STATUS_COMPLETED => 'Completed',  
                self::STATUS_CANCELLED => 'Cancelled',  
            ];  
        }  
    
        // Get status badge color  
        public function getStatusColorClass()  
        {  
            return match($this->status) {  
                self::STATUS_PENDING => 'yellow',  
                self::STATUS_PROCESSING => 'blue',  
                self::STATUS_COMPLETED => 'green',  
                self::STATUS_CANCELLED => 'red',  
                default => 'gray',  
            };  
        }  
    public function items()  
    {  
        return $this->hasMany(CartItem::class);  
    }  

    public function user()  
    {  
        return $this->belongsTo(User::class);  
    }  

    public function updateTotalAmount()  
    {  
        $this->total_amount = $this->items->sum(function($item) {  
            return ($item->product->new_price != $item->product->original_price ? $item->product->new_price * $item->quantity : $item->product->original_price) * $item->quantity;  
        });  
        $this->save();  
    }  
    public function total()  
    {  
        return $this->items->sum(function($item) {  
            return ($item->product->new_price != $item->product->original_price ? $item->product->new_price * $item->quantity : $item->product->original_price) * $item->quantity;  
        });  
    }  
} 