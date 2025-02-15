<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company Registration</title>
</head>
<body>

    <div class="container">
        <form action="{{  route('register', ['user_type_id' => $user_type_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="user_type_id" value="0">
            <div class="form-group">
                <label for="company-logo">Company Logo:</label>
                <input type="file" name="company_image-url" required>
                @error('company_image-url')
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
                <input type="email" name="email" required>
                @error('email')
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
