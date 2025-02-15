<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang tuyển dụng')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h1 class="logo">Recr.</h1>
            <ul class="menu">
                <li><a href="{{ route('jobs.index') }}">Việc làm</a></li>
                @if (Session::has('user_id'))
                    <li><a href="{{ route('profile.show', Session::get('user_id')) }}">Tài khoản</a></li>
                    <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                @else
                    <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    <li><a href="{{ route('user_type') }}">Đăng ký</a></li>
                @endif
            </ul>
        </aside>

        <!-- Nội dung chính -->
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
