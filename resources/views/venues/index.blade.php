index.blade.venues
<x-app-layout>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Venues</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">🏠 Home</a>
                <a href="{{ route('events.index') }}" class="btn btn-outline-primary">📋 Events</a>
                <a href="{{ route('venues.create') }}" class="btn btn-success">➕ Create Venue</a>
            </div>
        </div>

        @if ($venues->isEmpty())
            <div class="alert alert-info">
                No venues available yet.
            </div>
        @else
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Capacity</th>
                        <th>Created At</th>
                        <th>Actions</th> {{-- Toegevoegde kolom --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venues as $venue)
                        <tr>
                            <td>{{ $venue->name }}</td>
                            <td>{{ $venue->address ?? '-' }}</td>
                            <td>{{ $venue->city ?? '-' }}</td>
                            <td>{{ $venue->country ?? '-' }}</td>
                            <td>{{ $venue->capacity ?? '-' }}</td>
                            <td>{{ $venue->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('venues.events', $venue->id) }}" class="btn btn-sm btn-primary">
                                    📅 View Events
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>

