<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::with(['order', 'product'])->get();
        return response()->json($orderItems);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($validated);
        return response()->json($orderItem, 201);
    }

    public function show($id)
    {
        $orderItem = OrderItem::with(['order', 'product'])->findOrFail($id);
        return response()->json($orderItem);
    }

    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $validated = $request->validate([
            'order_id' => 'sometimes|required|exists:orders,order_id',
            'product_id' => 'sometimes|required|exists:products,product_id',
            'quantity' => 'sometimes|required|integer',
            'price' => 'sometimes|required|numeric',
        ]);

        $orderItem->update($validated);
        return response()->json($orderItem);
    }

    public function destroy($id)
    {
        OrderItem::destroy($id);
        return response()->json(null, 204);
    }
}
