<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_item_id';
    // public $incrementing = true;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    /**
     * Many to One relationship
     * Many order items belong to One Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    /**
     * One to One relationship
     * One Order Item belongs to One Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
