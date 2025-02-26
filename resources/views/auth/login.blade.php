<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
          height: 100vh;
          margin: 0;
          background: radial-gradient(circle, rgba(230, 0, 255, 0.944), rgba(0, 81, 255, 0.905));
        }
    </style>
</head>
<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required>
        @error('account')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Đăng nhập</button>
    </form>
    <p style="color: white;">Chưa có tài khoản? <a href="{{ route('user_type') }}">Đăng ký</a></p>
    <script src="{{ asset('js/auth.js') }}"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Thành công!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if (session('account'))
        <script>
            Swal.fire({
                title: 'Thất bại!',
                text: '{{ session('account') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</body>
</html>
