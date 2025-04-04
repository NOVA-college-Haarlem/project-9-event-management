<x-app-layout>
    <div class="container mt-4">
        <h2 class="mb-4">Geef je feedback</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('feedback.store') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Jouw e-mailadres</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="event_id" class="form-label">Which event is your feedback about?</label>
                <select name="event_id" id="event_id" class="form-control" required>
                    <option value="">-- Select an Event --</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }} ({{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }})</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="feedback" class="form-label">Jouw feedback</label>
                <textarea name="feedback" class="form-control" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Verstuur feedback</button>
        </form>
    </div>
</x-app-layout>
