<x-app-layout>
    <div class="container text-center">
        <h1 class="mb-4">Event Management Dashboard</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="d-grid gap-3">
                    <a href="{{ route('events.index') }}" class="btn btn-primary btn-lg">📋 View All Events</a>
                    <a href="{{ route('events.create') }}" class="btn btn-success btn-lg">➕ Create New Event</a>
                    {{-- Add more buttons for other sections --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
