<x-app-layout>
    <div class="container mt-4">
        <h2>Register for Event</h2>

        <p class="text-muted">You're registering for: <strong>{{ $event->name }}</strong></p>


        <form action="{{ route('registrations.store', ['event' => $event->id]) }}" method="POST">

            @csrf

            <!-- Persoonlijke gegevens -->
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input name="email" type="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input name="address" class="form-control">
            </div>


            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</x-app-layout>
