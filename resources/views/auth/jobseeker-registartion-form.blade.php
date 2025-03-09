<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>JobSeeker Registration</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            background: radial-gradient(circle, rgba(230, 0, 255, 0.944), rgba(0, 81, 255, 0.905));
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-group label {
            width: 30%;
            text-align: right;
            margin-right: 10px;
        }
        .form-group input, .form-group select {
            width: 65%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group div {
            color: red;
            text-align: left;
            margin-left: 30%;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>JobSeeker Registration</h2>
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