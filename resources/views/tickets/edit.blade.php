<x-app-layout>
    <div class="container">
        <h2>Edit Ticket</h2>
    
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('tickets.update', $ticket->ticket_id) }}" method="POST">
            @csrf
            @method('POST')
    
            <div class="mb-3">
                <label for="event_id" class="form-label">Event</label>
                <select class="form-control" id="event_id" name="event_id" required>
                    <option value="">-- Choose an Event --</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ $ticket->event_id == $event->id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">-- Choose a User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $ticket->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ $ticket->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="canceled" {{ $ticket->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Purchase Date</label>
                <input type="datetime-local" class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date', $ticket->purchase_date) }}" required>
            </div>
    
    
            <button type="submit" class="btn btn-primary">Update Ticket</button>
        </form>
    </div>
</x-app-layout>
