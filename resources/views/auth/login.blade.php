<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
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

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>