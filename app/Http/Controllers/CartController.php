<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $product = Product::findOrFail($request->input('product_id'));
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        $order = $user->orders()->where('status', 'pending')->first();

        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
                'status' => 'pending',
                'total_amount' => 0,
                'shipping_address' => '',
                'payment_info' => ''
            ]);
        }

        $orderItem = $order->items()->where('product_id', $product->product_id)->first();

        if ($orderItem) {
            $orderItem->quantity += $quantity;
            $orderItem->price = $price;
            $orderItem->save();
        } else {
            OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $product->product_id,
                'quantity' => $quantity,
                'price' => $price,
            ]);
        }

        $order->total_amount = $order->items->sum(function($item) {
            return $item->quantity * $item->price;
        });
        $order->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully.');
    }

    public function remove($product_id)
    {
        $user = Auth::user();
        $order = $user->orders()->where('status', 'pending')->first();

        if ($order) {
            $orderItem = $order->items()->where('product_id', $product_id)->first();

            if ($orderItem) {
                $orderItem->delete();
            }

            $order->total_amount = $order->items->sum(function($item) {
                return $item->quantity * $item->price;
            });
            $order->save();
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
    }

    public function index()
    {
        $user = Auth::user();
        $order = $user->orders()->where('status', 'pending')->first();

        if (!$order) {
            $order = new Order();
        }

        return view('cart.index', ['order' => $order]);
    }
}
