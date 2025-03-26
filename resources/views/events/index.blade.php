<x-app-layout>
    <div class="container">
        <h2>All Events</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">🏠 Home</a>
            <a href="{{ route('venues.index') }}" class="btn btn-outline-primary">📍 Venues</a>
            <a href="{{ route('events.create') }}" class="btn btn-success">➕ Create Event</a>
        </div>
        @if ($events->isEmpty())
            <p>No events found.</p>
        @else
            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Virtual</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d H:i') }}</td>
                            <td>{{ $event->is_virtual ? 'Yes' : 'No' }}</td>
                            <td>{{ $event->status }}</td>
                            <td>
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                <form action="{{ route('events.delete', $event->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">🗑️ Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
