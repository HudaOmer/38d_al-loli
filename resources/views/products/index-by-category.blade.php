
        
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
                    {{ __("Hello, Dear Customer") }}
                </div>
                

            </div>
        </div>

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
                            <x-product-detail :product="$product" />
                        </div>

                        @php $counter++; @endphp
                    @endforeach
                </div>
            @endif
        </div>

        <div class="container mx-auto px-4 py-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/3 px-4 mb-6">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <!-- Content for the first div -->
                        <h2 class="text-lg font-bold mb-2">Item 1</h2>
                        <p class="text-gray-600">Description for Item 1.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-6">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <!-- Content for the second div -->
                        <h2 class="text-lg font-bold mb-2">Item 2</h2>
                        <p class="text-gray-600">Description for Item 2.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-6">
                    <div class="bg-white shadow-md rounded-lg p-4">
                        <!-- Content for the third div -->
                        <h2 class="text-lg font-bold mb-2">Item 3</h2>
                        <p class="text-gray-600">Description for Item 3.</p>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</x-app-layout>
