<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobSeeker Registration</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <style>
        body {
            height: 100vh;
            margin: 0;
            background: radial-gradient(circle, rgba(230, 0, 255, 0.944), rgba(0, 81, 255, 0.905));
          }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('job_seeker_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_of_birth">Birthday:</label>
                <input type="date" name="date_of_birth" required>
                @error('date_of_birth')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" required>
                    <option selected disabled>-- Select Gender --</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
                @error('gender')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="user_image">Avatar:</label>
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
            </div>
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
    </div>
</body>
</html>