<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar & Footer</title>
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">Assignment #2</div>
        <ul class="nav-links">
            <li><a href="{{ route('welcome.index') }}">Home</a></li>
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
            <li><a href="{{ route('signoutpage.index') }}">Signout</a></li>
        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('article.partials.update-delete-form')
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>
</body>

</html>
