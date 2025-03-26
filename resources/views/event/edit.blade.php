<x-app-layout>
    <div class="container">
        <h2>Edit Event</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> There were some issues with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" class="form-control" value="{{ $event->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="datetime-local" name="start_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="datetime-local" name="end_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label for="is_virtual" class="form-label">Is Virtual?</label>
                <select name="is_virtual" class="form-control" required>
                    <option value="0" {{ $event->is_virtual == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $event->is_virtual == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="venue_id" class="form-label">Venue ID</label>
                <input type="number" name="venue_id" class="form-control" value="{{ $event->venue_id }}" required>
            </div>

            <div class="mb-3">
                <label for="organizer_id" class="form-label">Organizer ID</label>
                <input type="number" name="organizer_id" class="form-control" value="{{ $event->organizer_id }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $event->status }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</x-app-layout>
