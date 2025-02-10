<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <form action="{{ route('register', ['user_type_id' => $user_type_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_type_id" value="{{ $user_type_id->id }}">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>
        @error('password_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="date_of_birth">Date of Birth:</label>
        <input type="date" name="date_of_birth" required>
        @error('date_of_birth')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="1">Male</option>
            <option value="0">Female</option>
        </select>
        @error('gender')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="contact_number">Contact Number:</label>
        <input type="text" name="contact_number" required>
        @error('contact_number')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="user_image">User Image:</label>
        <input type="file" name="user_image" required>
        @error('user_image')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>
