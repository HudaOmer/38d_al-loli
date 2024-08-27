<!-- resources/views/cart/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <!-- Display Cart Items -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-semibold">
                    {{ __("Your Cart") }}
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-6">
            @if ($order->items->isEmpty())
                <p class="text-center text-lg font-semibold">Your cart is empty.</p>
            @else
                @php $counter = 0; @endphp
                <div class="flex flex-wrap -mx-4">
                    @foreach ($order->items as $orderItem)
                    @if ($counter > 0 && $counter % 4 == 0)
                            </div>
                            <div class="flex flex-wrap -mx-4">
                        @endif
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-6">
                            <div class="bg-white shadow-md rounded-lg p-4" style="width: 330px; ">
                            <!-- Product Details -->
                                <x-cart-product-detail 
                                    :product="$orderItem->product" 
                                    :quantity="$orderItem->quantity" 
                                    :totalPrice="$orderItem->quantity * $orderItem->price" />

                                    <!-- Remove Button -->
                                <form action="{{ route('cart.remove', $orderItem->product->product_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="mt-4 w-full bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600" style="background-color: #3b82f6; color: #ffffff;">
                                        Remove from Cart
                                    </button>
                                </form>
                            </div>
                        </div>
                        @php $counter++; @endphp
                    @endforeach
                </div>

                <!-- Total Amount -->
                <div class="mt-4">
                    <p><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
                </div>
            @endif
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
</x-app-layout>
