<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Trang tuyển dụng')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            height: 100vh;
            margin: 0;
            background: radial-gradient(circle, rgba(230, 0, 255, 0.944), rgba(0, 81, 255, 0.905));
        }
    </style>
</head>

<body class="container-fluid">
    <div class="row mb-3">
        <nav class="navbar navbar-white bg-light shadow-sm">
            <a href="{{ route('jobs.index') }}" class="navbar-brand ms-2">
                <h3 class="text-warning">Recr.</h3>
            </a>
        </nav>
    </div>
    <div class="container-fluid main">
        <div class="row">
            <div class="col-sm-2 bg-white rounded-2">
                <ul class="menu">
                    <li><a href="{{ route('jobs.index') }}">Việc làm</a></li>
                    @if (session()->has('profile_url'))
                        <li><a href="{{ route('profile.show', ['profile_url' => session()->get('profile_url')])}}">Tài khoản</a></li>
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Đăng xuất
                            </a>
                        </li>
                        <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none">
                            @csrf
                        </form>
                    @else
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        <li><a href="{{ route('user_type') }}">Đăng ký</a></li>
                    @endif

                </ul>
            </div>
            <div class="col-sm-10">
                <main class="content">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
