<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang tuyển dụng')</title>
    {{--  <link rel="stylesheet" href="{{ asset('css/style.css') }}">  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="container-fluid">
        <!-- Sidebar -->
        <div class="row mb-2">
            <nav class="navbar navbar-dark bg-dark">
                <a href="#" class="navbar-brand ms-2"><h3>Recr.</h3></a>
            </nav>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <aside class="sidebar bg-danger">
                    <ul class="menu">
                        <li><a href="{{ route('jobs.index') }}">Việc làm</a></li>
                        @if (session('user_email'))
                            @php
                                $profile_url = Session::get('profile_url');
                            @endphp
                            <li><a href="{{ route('profile.show', compact('profile_url'))}}">Tài khoản</a></li>
                            <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a href="{{ route('user_type') }}">Đăng ký</a></li>
                        @endif
                    </ul>
                </aside>
            </div>
            <div class="col-sm-10">
                <main class="content">
                    @yield('content')
                </main>
            </div>
        </div>
</body>
</html>
