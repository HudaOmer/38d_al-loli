<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartProductDetail extends Component
{
    
    public $product;
    public $quantity;
    public $totalPrice;

    public function __construct($product, $quantity, $totalPrice)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->totalPrice = $totalPrice;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-product-detail');
    }
}
