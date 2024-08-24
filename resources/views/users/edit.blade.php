<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">

        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
        </select>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <button type="submit">Update</button>
    </form>
    <a href="{{ route('users.index') }}">Back to Users List</a>
</body>
</html>
