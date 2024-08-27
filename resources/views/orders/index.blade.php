<!-- resources/views/orders/index.blade.php -->
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="mb-4">
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Create Order</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($orders->isEmpty())
        <p>No orders found.</p>
    @else
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Shipping Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->status }}</td>
                        <td>${{ $order->total_amount }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-info">View</a>
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-admin-layout>
