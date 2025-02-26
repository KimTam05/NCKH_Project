<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>User Type</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            background: radial-gradient(circle, rgba(230, 0, 255, 0.944), rgba(0, 81, 255, 0.905));
          }
    </style>
</head>
<body>
    <h1 class="text-white">Bạn có phải là:</h1>
    <div class="d-flex">
        <a href="{{ route('job_seeker') }}" class="btn btn-primary me-2">Người kiếm việc</a>
        <a href="{{ route('employer') }}" class="btn btn-success">Nhà tuyển dụng</a>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
