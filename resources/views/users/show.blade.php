<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('عقد اللولي') }}
        </h2>
    </x-slot>
    
    <div class="container mx-auto px-4 py-6">
        <!-- User Details Container -->
        <div class="flex items-start bg-white p-6 rounded-lg shadow-lg">
            <!-- SVG Icon -->
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 50 50" class="text-gray-600">
                    <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path stroke="#b59212" d="M32.354 16.667a14.584 14.584 0 1 1-14.708 0"/>
                        <path stroke="#306cfe" d="M27.604 22.917h-5.208L14.583 12.5l5.209-6.25h10.416l5.209 6.25z"/>
                    </g>
                </svg>
            </div>

            <!-- User Details -->
            <div class="ml-6 flex-1">
                <h1 class="text-2xl font-semibold text-gray-800">User Details</h1>
                <p class="mt-4"><strong class="text-gray-700">Name:</strong> {{ $user->name }}</p>
                <p class="mt-2"><strong class="text-gray-700">Email:</strong> {{ $user->email }}</p>
                <p class="mt-2"><strong class="text-gray-700">Role:</strong> {{ $user->role }}</p>
                <p class="mt-2"><strong class="text-gray-700">Status:</strong> {{ $user->status }}</p>
            </div>

            <!-- Action Buttons (Right Aligned) -->
            <div class="ml-6 flex flex-col justify-center">
                <!-- Edit Button -->
                <a href="{{ route('users.edit', $user) }}" class="inline-block bg-white text-black px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mb-2">Edit</a>

                <!-- Delete Button -->
                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block bg-white text-black px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Delete</button>
                </form>
            </div>
        </div>

        <!-- Back to Users List -->
        <div class="mt-6">
            <a href="{{ route('users.index') }}" class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400">Back to Users List</a>
        </div>
    </div>
</x-admin-layout>
