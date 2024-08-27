<!-- resources/views/orders/create.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Order') }}
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

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="pending">Pending</option>
            <option value="shipped">Shipped</option>
            <option value="delivered">Delivered</option>
        </select>

        <label for="total_amount">Total Amount:</label>
        <input type="number" name="total_amount" id="total_amount" step="0.01" required>

        <label for="shipping_address">Shipping Address:</label>
        <input type="text" name="shipping_address" id="shipping_address" required>

        <label for="payment_info">Payment Info:</label>
        <textarea name="payment_info" id="payment_info" rows="4" required></textarea>

        <button type="submit">Create Order</button>
    </form>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to Orders List</a>
</x-admin-layout>
