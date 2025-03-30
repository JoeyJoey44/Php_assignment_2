<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="register.css"> <!-- Include your CSS file here -->
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Assignment #2</div>
        <ul class="nav-links">
        <li><a href="{{ route('welcome.index') }}">Home</a></li>
        <li><a href="{{ route('loginpage.index') }}">Login</a></li>
        <li><a href="{{ route('signoutpage.index') }}">Signout</a></li>
        </ul>
    </nav>

    <!-- Form Container -->
    <div class="form-container">
        <!-- Form -->
        <div class="form">
            <h2 class="form-heading">Forgot Your Password?</h2>

            <div class="mb-4 text-sm text-gray-600">
                <p>
                    Forgot your password? No problem. Just let us know your email address and we will email you a
                    password reset link that will allow you to choose a new one.
                </p>
            </div>

            <!-- Session Status -->
            <div class="session-status mb-4">
                <!-- You can add session messages here if necessary -->
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}"
                        required autofocus />
                    <div class="form-error mt-2">
                        <!-- Display error messages for the email field -->
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="btn">
                        Email Password Reset Link
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Your Company</p>
    </footer>
</body>

</html>
