<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>JobSeeker Registration</title>
</head>
<body>
    <form action="{{  route('register', ['user_type_id' => $user_type_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="hidden" name="user_type_id" value="1">
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
            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="1">Male</option>
                <option value="0">Female</option>
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
