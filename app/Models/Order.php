<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    

    protected $primaryKey = 'order_id';
    
    // public $incrementing = false;
    
     protected $fillable = [
        'user_id',
        'status',
        'total_amount',
        'shipping_address',
        'payment_info',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    /**
     *  One to One relationship
     *  One Order Belongs to one User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
