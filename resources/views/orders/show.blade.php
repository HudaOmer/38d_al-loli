<!-- resources/views/orders/show.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div>
        <p><strong>ID:</strong> {{ $order->order_id }}</p>
        <p><strong>User ID:</strong> {{ $order->user_id }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>
        <p><strong>Total Amount:</strong> ${{ $order->total_amount }}</p>
        <p><strong>Shipping Address:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Payment Info:</strong> {{ $order->payment_info }}</p>
    </div>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
</x-admin-layout>
