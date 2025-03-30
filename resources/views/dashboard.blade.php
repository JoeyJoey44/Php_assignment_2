<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dash.css"> <!-- Include your CSS file here -->
</head>

<body class="bg-light-gray text-white">

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Assignment #2</div>
        <ul class="nav-links">
        <li><a href="{{ route('posts.index') }}">Post</a></li>
        <li><a href="{{ route('loginpage.index') }}">Login</a></li>
        <li><a href="{{ route('signoutpage.index') }}">Signout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-blue-500 text-center">Dashboard</h2>
                    <div class="mt-4 text-gray-900 text-center">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joey</p>
    </footer>

</body>

</html>
