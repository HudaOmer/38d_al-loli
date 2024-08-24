<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
</head>
<body>
    <h1>User Details</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
    <p><strong>Status:</strong> {{ $user->status }}</p>

    <a href="{{ route('users.edit', $user) }}">Edit</a>
    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('users.index') }}">Back to Users List</a>
</body>
</html>
