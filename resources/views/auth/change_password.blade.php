<!DOCTYPE html>
<html>
<head>
    <title>Đổi Mật Khẩu</title>
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
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')
        <label for="current_password">Mật Khẩu Hiện Tại:</label>
        <input type="password" name="current_password" required>
        @error('current_password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="new_password">Mật Khẩu Mới:</label>
        <input type="password" name="new_password" required>
        @error('new_password')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="new_password_confirmation">Xác Nhận Mật Khẩu Mới:</label>
        <input type="password" name="new_password_confirmation" required>
        @error('new_password_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Cập Nhật Mật Khẩu</button>
    </form>
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
</body>
</html>