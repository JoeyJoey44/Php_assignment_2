<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar & Footer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
    <div class="logo">Assignment #2</div>
    <ul class="nav-links">
        <!-- Link to the posts page -->
        <li><a href="{{ route('posts.index') }}">Post</a></li>
        <li><a href="{{ route('loginpage.index') }}">Login</a></li>
        <li><a href="{{ route('signoutpage.index') }}">Signout</a></li>

    </ul>
</nav>


    <!-- MAIN CONTENT -->
    <main>
        <h1 class="accentText">Index Page</h1>
        <br></br>
        <h5 class="posts">Articles Should Go Here</h5>
        <!-- Articles Section -->
        @foreach ($articles as $article)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $article->title }}</h3>
                    <p class="card-text">{{ nl2br(e($article->content)) }}</p>
                    <p class="text-muted">
                        {{-- By {{ $article->author_first_name ?? 'Unknown' }} {{ $article->author_last_name ?? '' }}  --}}
                        on {{ $article->created_at->format('F j, Y') }}
                    </p>
                    {{-- <form method="POST" action="{{ route('articles.destroy', $article->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" onclick="return confirm('Are you sure?')">Delete</button>
                    </form> --}}
                    {{-- <a href="{{ route('articles.edit', $article->id) }}" class="btn">Edit</a> --}}
                </div>
            </div>
        @endforeach
        <p class="accentText"></p>
        <div id="posts"></div>
    </main>

    <script>
        function loadPosts(posts) {
    const postsContainer = document.getElementById("posts");
    postsContainer.innerHTML = ""; // Clear previous posts

    posts.forEach(post => {
        const postElement = document.createElement("div");
        let content = post.body;

        // If content is longer than 100 characters, truncate and add "Read More" button
        if (content.length > 100) {
            content = content.substring(0, 100) + "...";
            content += `<br><a href="display.php?article_id=${post.article_id}" class="read-more">Read More</a>`;
        }

        postElement.innerHTML = `
            <h2>${post.title}</h2>
            <p><strong>By:</strong> ${post.contributor_username} | <strong>Posted on:</strong> ${post.create_date}</p>
            <p>${content}</p>
            <hr>
        `;
        postsContainer.appendChild(postElement);
    });
}


        function getPosts() {
            fetch("homepage.php")
            .then(response => response.json())
            .then(data => {
                loadPosts(data);
            })
            .catch(error => console.error("Error:", error));
        }

        // Call the function when the page loads
        window.onload = getPosts;
    </script>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>
</body>
</html>
