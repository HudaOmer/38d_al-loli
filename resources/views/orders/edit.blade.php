<!-- resources/views/orders/edit.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" value="{{ $order->user_id }}" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
        </select>

        <label for="total_amount">Total Amount:</label>
        <input type="number" name="total_amount" id="total_amount" step="0.01" value="{{ $order->total_amount }}" required>

        <label for="shipping_address">Shipping Address:</label>
        <input type="text" name="shipping_address" id="shipping_address" value="{{ $order->shipping_address }}" required>

        <label for="payment_info">Payment Info:</label>
        <textarea name="payment_info" id="payment_info" rows="4" required>{{ $order->payment_info }}</textarea>

        <button type="submit">Update Order</button>
    </form>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
</x-admin-layout>
