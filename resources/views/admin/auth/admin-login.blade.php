<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            color: #555;
        }
        .form-control {
            border-radius: 5px;
            box-shadow: none;
            border: 1px solid #ddd;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .alert {
            margin-top: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="{{ url('admin/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple JavaScript to handle form errors
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var errorMessage = document.getElementById('error-message');

            if (!email || !password) {
                errorMessage.style.display = 'block';
                errorMessage.textContent = 'Both fields are required.';
            } else {
                this.submit();
            }
        });
    </script>
</body>
</html>