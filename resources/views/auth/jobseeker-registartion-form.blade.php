<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>JobSeeker Registration</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  --}}
    <style>
        body {
          height: 100vh;
          margin: 0;
          background: radial-gradient(circle, rgba(230, 0, 255, 0.944), rgba(0, 81, 255, 0.905));
        }
    </style>
</head>
<body>
    <form action="{{ route('job_seeker_submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="first-name">First Name:</label>
            <input type="text" name="first_name" required>
            @error('first_name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="last-name">Last Name:</label>
            <input type="text" name="last_name" required>
            @error('last_name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date-of-birth">Birthday:</label>
            <input type="date" name="date_of_birth" required>
            @error('date_of_birth')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" required>
            @error('address')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option selected disabled>--chọn giới tính--</option>
                <option value="1">Nam</option>
                <option value="0">Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" name="user_image" required>
            @error('user_image')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" required>
            @error('contact_number')
                <div>{{ $message }}</div>
            @enderror
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
            @error('password_confirmation')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Register</button>
    </form>
</body>
</html>
