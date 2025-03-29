<form method="POST" action="{{ route('article.update', $article->id) }}" class="form mb-4" id="article-form">
    @csrf
    @method('PATCH') <!-- Default method is PATCH for updating -->

    <div class="form-group">
        <label for="title">Article Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $article->title) }}" required>
    </div>

    <div class="form-group">
        <label for="body">Content</label>
        <textarea class="form-control" id="body" name="body" required>{{ old('body', $article->body) }}</textarea>
    </div>

    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $article->start_date ? $article->start_date->format('Y-m-d\TH:i') : '') }}" required>
    </div>

    <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $article->end_date ? $article->end_date->format('Y-m-d\TH:i') : '') }}" required>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update Article</button>
        <button type="button" class="btn btn-danger" id="delete-button">Delete Article</button>
    </div>
</form>

<script>
    // JavaScript to handle the delete button
    document.getElementById('delete-button').addEventListener('click', function () {
        const form = document.getElementById('article-form');
        if (confirm('Are you sure you want to delete this article?')) {
            form.action = "{{ route('article.destroy', $article->id) }}"; // Change the form action to the delete route
            form.method = 'POST'; // Change the form method to POST
            const methodInput = document.createElement('input'); // Add a hidden input for the DELETE method
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);
            form.submit(); // Submit the form
        }
    });
</script>

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