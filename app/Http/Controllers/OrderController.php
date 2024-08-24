<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return response()->json($orders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'status' => 'required|in:pending,shipped,delivered',
            'total_amount' => 'required|numeric',
            'shipping_address' => 'required|string|max:255',
            'payment_info' => 'required|string',
        ]);

        $order = Order::create($validated);
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return response()->json($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'sometimes|required|exists:users,user_id',
            'status' => 'sometimes|required|in:pending,shipped,delivered',
            'total_amount' => 'sometimes|required|numeric',
            'shipping_address' => 'sometimes|required|string|max:255',
            'payment_info' => 'sometimes|required|string',
        ]);

        $order->update($validated);
        return response()->json($order);
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json(null, 204);
    }
}
