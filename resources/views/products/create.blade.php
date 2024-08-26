<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>
    
    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" step="0.01" required>

        <label for="category">Category:</label>
        <select name="category" id="category" required>
            <option value="ring">Ring</option>
            <option value="necklace">Necklace</option>
            <option value="earring">Earring</option>
            <option value="bracelet">Bracelet</option>
            <option value="home-accessories">Home Accessories</option>
            <option value="head-accessories">Head Accessories</option>
        </select>

        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" name="stock_quantity" id="stock_quantity" required>

        <button type="submit">Create</button>
    </form>
    
    <a href="{{ route('products.index') }}">Back to Products List</a>
    
</x-admin-layout>
