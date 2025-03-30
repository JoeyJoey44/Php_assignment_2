<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <a href="#">Assignment #2</a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ route('welcome.index') }}">Home</a></li>
            <li><a href="{{ route('loginpage.index') }}">Login</a></li>
            <li><a href="{{ route('signoutpage.index') }}">Signout</a></li>
        </ul>
    </nav>

    <!-- Form Container -->
    <div class="form-container">
        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf

            <!-- Title -->
            <h1 class="accentText">Log in</h1>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                @if ($errors->has('email'))
                    <div class="input-error">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" />
                @if ($errors->has('password'))
                    <div class="input-error">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="form-group remember-group">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Remember me') }}</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="btn">
                    {{ __('Log in') }}
                </button>
            </div>
        </form>

        <!-- Register Button -->
        <div class="form-link-container">
            <a href="{{ route('register') }}" class="btn">
                {{ __('Create an account') }}
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>

</body>
</html>
