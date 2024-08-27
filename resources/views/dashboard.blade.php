<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('عقد اللولي') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <form method="GET" action="{{ url()->current() }}">
                        <label for="sort" class="mr-5 text-lg font-semibold">Order By:</label>
                        <select name="sort" id="sort" class="p-5 border rounded" style="width: 200px; height: 100%; max-width: 100%;">
                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price High to Low</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name A to Z</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z to A</option>
                        </select>
                        <button type="submit" class="ml-4 px-4 py-2 bg-blue-500 text-black rounded">Sort</button>
                    </form>

                </div>
            </div>
        </div>

        @php
            $sort = request('sort', 'default');

            $query = App\Models\Product::query();

            switch ($sort) {
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                default:
                    // Default sorting logic (e.g., by ID or created_at)
                    $query->orderBy('product_id', 'asc');
                    break;
            }

            $products = $query->get();
        @endphp
        <div class="container mx-auto px-4 py-6">
            @if ($products->isEmpty())
                <p class="text-center text-lg font-semibold">No products found in this category.</p>
            @else
                @php $counter = 0; @endphp
                <div class="flex flex-wrap -mx-4">
                    @foreach ($products as $product)
                        @if ($counter > 0 && $counter % 4 == 0)
                            </div>
                            <div class="flex flex-wrap -mx-4">
                        @endif
                        
                        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-6">
                            <div class="bg-white shadow-md rounded-lg p-4">
                                <!-- Product Details -->
                                <x-product-detail :product="$product" />
                                
                                <!-- Add to Cart Form -->
                                <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="number" name="quantity" min="1" value="1" required class="w-full p-2 border border-gray-300 rounded-md">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button type="submit" class="w-full mt-2 bg-blue-500 text-black py-2 px-4 rounded-md hover:bg-blue-600"style="background-color: #3b82f6; color: #ffffff;" >Add to Cart</button>
                                </form>
                            </div>
                        </div>

                        @php $counter++; @endphp
                    @endforeach
                </div>
            @endif
        </div>
        
    </div>
</x-app-layout>
