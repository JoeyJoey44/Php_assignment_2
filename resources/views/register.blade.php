<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css"> <!-- Link to your custom CSS -->
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

    <!-- Register Form Container -->
    <div class="form-container">
        <div class="form">
            <!-- Heading with text "Register" -->
            <h2 class="form-heading">Register</h2>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- First Name -->
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name</label>
                    <input id="first_name" class="form-input" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="given-name" />
                    @error('first_name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input id="last_name" class="form-input" type="text" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name" />
                    @error('last_name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    @error('email')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-link-container">
                    <a class="form-link" href="{{ route('login') }}">
                        Already registered?
                    </a>

                    <button type="submit" class="btn">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>
</body>
</html>
