<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar & Footer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <main class="container mt-5">
        <div class="article-details p-4 rounded shadow-sm">
            <h1 class="display-4">{{ $article->title }}</h1>
            <p><strong>By:</strong> {{ $article->user->first_name ?? 'Unknown' }} {{ $article->user->last_name ?? '' }}</p>
            <p><strong>Published On:</strong> {{ $article->created_at->format('F j, Y') }}</p>
            <p><strong>Start Date:</strong> {{ $article->start_date->format('F j, Y g:i A') }}</p>
            <p><strong>End Date:</strong> {{ $article->end_date->format('F j, Y g:i A') }}</p>
            <div class="article-body">
                {!! nl2br(e($article->body)) !!}
            </div>
        </div>

        <br>
        <a href="{{ route('home') }}" class="btn btn-primary mt-4">Back</a>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>
</body>

</html>
