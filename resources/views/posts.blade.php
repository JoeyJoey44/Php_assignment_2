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
        <form method="post" action="{{ route('article.store') }}" class="form mb-4">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Article Title" required>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="body" placeholder="Write your article here..." required></textarea>
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
        <!-- Articles Section -->
        <section class="articles-container">
            @foreach ($articles as $article)
                <div class="article">
                    <h2>{{ $article->title }}</h2>
                    <p class="article-meta">
                        By {{ $article->user->first_name ?? 'Unknown' }} {{ $article->user->last_name ?? '' }}
                        on {{ $article->created_at->format('F j, Y') }}
                    </p>
                    <p>{{ Str::limit($article->body, 100) }}</p>
                    <div class="article-buttons">
                        <a href="{{ route('article.show', $article->id) }}" class="read-more">More</a>
                        <a href="{{ route('article.edit', $article->id) }}" class="read-more">Edit</a>
                    </div>
                </div>
            @endforeach
        </section>
        
        
        
        <p class="accentText"></p>
        <div id="posts"></div>
    </main>

    <script>
        // Get the current date and time
        const now = new Date();
        const formattedNow = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}T${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
    
        // Set the minimum value for the start_date to the current date and time
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        startDateInput.min = formattedNow;

        // Set the initial minimum value for the end_date to match the start_date's minimum
        endDateInput.min = formattedNow;
    
        // Ensure the end_date is always after the start_date
        startDateInput.addEventListener('change', () => {
            const startDate = new Date(startDateInput.value);
            const now = new Date(); // Get the current time again to ensure accuracy
    
            // If the selected start_date is earlier than the current time, reset it to the current time
            if (startDate < now) {
                alert('Start date and time cannot be in the past.');
                now = new Date();
                formattedNow = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}T${String(now.getHours()).padStart(2, '0')}:${String(now.getMinutes()).padStart(2, '0')}`;
                startDateInput.value = formattedNow;
            }
    
            // Update the minimum value for the end_date
            const formattedStartDate = `${startDate.getFullYear()}-${String(startDate.getMonth() + 1).padStart(2, '0')}-${String(startDate.getDate()).padStart(2, '0')}T${String(startDate.getHours()).padStart(2, '0')}:${String(startDate.getMinutes()).padStart(2, '0')}`;
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

        document.querySelector('form').addEventListener('submit', (event) => {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            const now = new Date();

            // Check if the start_date is in the past
            if (startDate < now) {
                alert('Start date and time cannot be in the past.');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if the end_date is before or equal to the start_date
            if (endDate <= startDate) {
                alert('End date must be after the start date.');
                event.preventDefault(); // Prevent form submission
                return;
            }
        });
    </script>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Alzen, Daniel, Joseph</p>
    </footer>
</body>

</html>
