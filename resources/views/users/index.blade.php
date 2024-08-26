<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        
    <div class="flex justify-center min-h-screen">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold mb-4">Users</h1>
            <a href="{{ route('users.create') }}" class="inline-block bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mb-4">
            Create User</a>
            <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b border-gray-300">Role</th>
                        <th class="py-2 px-4 border-b border-gray-300">Status</th>
                        <th class="py-2 px-4 border-b border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $user->role }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">{{ $user->status }}</td>
                        <td class="py-2 px-4 border-b border-gray-300">
                            <!-- Show Button -->
                            <a href="{{ route('users.show', $user) }}" class="inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">Show</a>

                            <!-- Edit Button -->
                            <a href="{{ route('users.edit', $user) }}" class="inline-block bg-amber-500 text-black px-4 py-2 rounded-md hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 mr-2">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 text-black px-4 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
 