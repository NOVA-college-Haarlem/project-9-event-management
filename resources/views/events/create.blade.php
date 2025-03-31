<x-app-layout>
    <div class="container">
        <h2>Create New Event</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="datetime-local" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="datetime-local" name="end_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="is_virtual" class="form-label">Is Virtual?</label>
                <select name="is_virtual" class="form-control" required>
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="venue_id" class="form-label">Venue ID</label>
                <input type="number" name="venue_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="room" class="form-label">Room (optional)</label>
                <input type="text" name="room" class="form-control" placeholder="e.g. Room A, Vak B">
            </div>

            <div class="mb-3">
                <label for="organizer_id" class="form-label">Organizer ID</label>
                <input type="number" name="organizer_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" required placeholder="e.g. Draft, Active, Cancelled">
            </div>

            <button type="submit" class="btn btn-primary">Create Event</button>
        </form>
    </div>
</x-app-layout>
