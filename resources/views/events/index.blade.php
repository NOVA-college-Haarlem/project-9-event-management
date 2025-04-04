<x-app-layout>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold text-primary">All Events</h2>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('events.create') }}" class="btn btn-success">➕ Create Event</a>
                @endif
            @endauth
            <a href="{{ route('events.calendar') }}" class="btn btn-outline-primary">📅 View Calendar</a>
        </div>
        
        @if ($events->isEmpty())
            <div class="alert alert-info">No events available yet.</div>
        @else
            <div class="row g-4">
                @foreach ($events as $event)
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body">
                                <h4 class="card-title fw-bold text-primary">{{ $event->name }}</h4>
                                <p class="text-muted">{{ $event->description }}</p>
                                <div class="d-flex justify-content-between">
                                    <span class="badge bg-secondary">{{ $event->start_date }} - {{ $event->end_date }}</span>
                                    <span class="badge bg-{{ $event->status == 'published' ? 'success' : 'warning' }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </div>
                                <div class="mt-3 d-flex gap-2">
                                    <a href="{{ route('registrations.create', $event->id) }}" class="btn btn-warning btn-sm" >📝 Register</a>
                                    @if (auth()->user()->is_admin)
                                        
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                                    <form action="{{ route('events.delete', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>