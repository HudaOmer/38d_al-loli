<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Display validation errors --}}
        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="name" class="block text-gray-700">Product Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required class="border p-2 w-full">
        </div>

        <div>
            <label for="description" class="block text-gray-700">Description:</label>
            <textarea name="description" id="description" rows="4" required class="border p-2 w-full">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label for="price" class="block text-gray-700">Price:</label>
            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" required class="border p-2 w-full">
        </div>

        <div>
            <label for="category" class="block text-gray-700">Category:</label>
            <select name="category" id="category" required class="border p-2 w-full">
                <option value="ring" {{ old('category', $product->category) == 'ring' ? 'selected' : '' }}>Ring</option>
                <option value="necklace" {{ old('category', $product->category) == 'necklace' ? 'selected' : '' }}>Necklace</option>
                <option value="earring" {{ old('category', $product->category) == 'earring' ? 'selected' : '' }}>Earring</option>
                <option value="bracelet" {{ old('category', $product->category) == 'bracelet' ? 'selected' : '' }}>Bracelet</option>
                <option value="home-accessories" {{ old('category', $product->category) == 'home-accessories' ? 'selected' : '' }}>Home Accessories</option>
                <option value="head-accessories" {{ old('category', $product->category) == 'head-accessories' ? 'selected' : '' }}>Head Accessories</option>
            </select>
        </div>

        <div>
            <label for="stock_quantity" class="block text-gray-700">Stock Quantity:</label>
            <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-500 text-black p-2 rounded">Update Product</button>
    </form>

    <a href="{{ route('products.index') }}" class="text-blue-500 underline mt-4 inline-block">Back to Products List</a>
</x-admin-layout>
