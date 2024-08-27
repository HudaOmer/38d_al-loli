<!-- <div> -->
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
<!-- </div> -->

<div class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between" style="width: 310px; height: 100%; max-width: 100%;">
    <!-- SVG Icon -->
    <div class="flex-shrink-0 mb-4 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 15 15">
            <path fill="#d3a831" d="M12 8.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 2.71-4.125l.176.137l.774.601A3.5 3.5 0 0 0 4 8.5C4 10.43 5.57 12 7.5 12S11 10.43 11 8.5a3.5 3.5 0 0 0-2.66-3.387l.95-.738A4.5 4.5 0 0 1 12 8.5m-4.5-4L10 2.555L9 1H6L5 2.555l1.5 1.167z"/>
        </svg>
    </div>

    <!-- Product Details -->
    <div class="flex-1">
        <h2 class="text-lg font-bold mb-2 truncate">{{ $product->name }}</h2>
        
        <p class="text-gray-600 mb-2 truncate">{{ $product->description }}</p>
        
        <p class="text-lg font-semibold mb-2">${{ number_format($product->price, 2) }}</p>
        
        <p class="text-sm text-gray-600 mb-2">Category: {{ $product->category }}</p>
        
        <!-- <p class="text-sm text-gray-600 mb-2">Stock: {{ $product->stock_quantity }}</p> -->

        <!-- Quantity and Total Price -->
        <p class="text-sm text-gray-600 mb-2">Quantity: {{ $quantity }}</p>
        <p class="text-lg font-semibold">Total Price: ${{ number_format($totalPrice, 2) }}</p>
    </div>
</div>
