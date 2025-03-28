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
            <li><a href="{{ route('welcome.index') }}">Home</a></li>
            <li><a href="{{ route('loginpage.index') }}">Login</a></li>
            <li><a href="{{ route('signoutpage.index') }}">Signout</a></li>
        </ul>
    </nav>

    <!-- MAIN CONTENT -->
    <main>
        <h1 class="accentText">Posts Page</h1>
        <h2 class="text">Write a New Article</h2>
        <form method="POST" action="{{ route('article.store') }}" class="form mb-4">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Article Title" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="content" placeholder="Write your article here..." required></textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
            </div>
            <button type="submit" name="create" class="btn">Publish</button>
        </form>
        <br></br>
        <h5 class="posts">Posts Should Go Here</h5>
        <p class="accentText"></p>
        <div id="posts"></div>
    </main>

    <script>
        // Get the current date and time
        const now = new Date();
        const formattedNow = now.toISOString().slice(0, 16); // Format as 'YYYY-MM-DDTHH:mm'
    
        // Set the minimum value for the start_date to the current date and time
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        startDateInput.min = formattedNow;
    
        // Ensure the end_date is always after the start_date
        startDateInput.addEventListener('change', () => {
            const startDate = new Date(startDateInput.value);
            const now = new Date(); // Get the current time again to ensure accuracy
    
            // If the selected start_date is earlier than the current time, reset it to the current time
            if (startDate < now) {
                alert('Start date and time cannot be in the past.');
                startDateInput.value = formattedNow;
            }
    
            // Update the minimum value for the end_date
            const formattedStartDate = startDate.toISOString().slice(0, 16);
            endDateInput.min = formattedStartDate;
        });
    
        endDateInput.addEventListener('change', () => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
    
            // Ensure the end_date is after the start_date
            if (endDate <= startDate) {
                alert('End date must be after the start date.');
                endDateInput.value = ''; // Clear the invalid end_date
            }
        });
    </script>

    {{-- <script>
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
    </script> --}}

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>
</body>

</html>
