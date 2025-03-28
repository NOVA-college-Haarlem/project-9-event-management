<x-app-layout>
    <div class="container mt-4">
        <h2>Register for Event</h2>

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

            <!-- Evenementvoorkeuren -->
            <div class="mb-3">
                <label class="form-label">Meal Preference</label>
                <select name="meal" class="form-control">
                    <option value="standard">Standard</option>
                    <option value="vegetarian">Vegetarian</option>
                    <option value="vegan">Vegan</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Workshop</label>
                <select name="workshop" class="form-control">
                    <option value="session1">Workshop Session 1</option>
                    <option value="session2">Workshop Session 2</option>
                </select>
            </div>

            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</x-app-layout>
