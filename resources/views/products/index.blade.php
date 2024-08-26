<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products Dashboard') }}
        </h2>
    </x-slot>

    
    <div class="flex justify-center min-h-screen">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold mb-4">Products</h1>
            <a href="{{ route('products.create') }}" class="inline-block bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mb-4">
                Add a New Product
            </a>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Description</th>
                        <th class="py-2 px-4 border-b border-gray-300">Price</th>
                        <th class="py-2 px-4 border-b border-gray-300">Category</th>
                        <th class="py-2 px-4 border-b border-gray-300">Stock Quantity</th>
                        <th class="py-2 px-4 border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $product->description }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">${{ number_format($product->price, 2) }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ ucfirst(str_replace('-', ' ', $product->category)) }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $product->stock_quantity }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <!-- Show Button -->
                            <a href="{{ route('products.show', $product) }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">
                                Show
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('products.edit', $product) }}" class="inline-block bg-yellow-500 text-black px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 mr-2">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 text-red px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
