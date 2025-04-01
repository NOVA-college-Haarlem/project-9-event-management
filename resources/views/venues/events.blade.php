<x-app-layout>
    <div class="container">
        <h2>Events at {{ $venue->name }}</h2>

        <a href="{{ route('venues.index') }}" class="btn btn-outline-secondary mb-3">⬅️ Back to Venues</a>

        @if ($venue->events->isEmpty())
            <p>No events scheduled at this venue.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Room</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venue->events as $event)
                        <tr>
                            <td>{{ $event->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}</td>
                            <td>{{ $event->room ?? 'N/A' }}</td>
                            <td>{{ ucfirst($event->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
