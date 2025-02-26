<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Registration</title>
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
        <form action="{{  route('employer_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="company-logo">Company Logo:</label>
                <input type="file" name="company_image_url" required>
                @error('company_image_url')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="company_name">Company Name:</label>
                <input type="text" name="company_name" required>
                @error('company_name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="company-website-url">Company Website URL:</label>
                <input type="text" name="company_website_url" required>
                @error('company_website_url')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="establishment-date">Establishment Date:</label>
                <input type="date" name="establishment_date">
                @error('establishment_date')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="company_email" required>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact-number">Contact Number:</label>
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
