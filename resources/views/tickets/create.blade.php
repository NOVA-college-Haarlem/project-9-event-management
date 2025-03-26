<x-app-layout>
    <div class="container">
    <h2>Create a Ticket</h2>
    
      @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select class="form-control" id="event_id" name="event_id" required>
                <option value="">-- Choose an Event --</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="">-- Choose a User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ticket_type_id" class="form-label">Ticket Type</label>
            <select class="form-control" id="ticket_type_id" name="ticket_type_id" required>
                <option value="">-- Choose a Ticket Type --</option>
                @foreach($ticketTypes as $ticketType)
                    <option value="{{ $ticketType->id }}">{{ $ticketType->name }} (€{{ $ticketType->price }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="canceled">Canceled</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="purchase_date" class="form-label">Purchase date</label>
            <input type="datetime-local" class="form-control" id="purchase_date" name="purchase_date" required>
        </div>

        <div class="mb-3">
            <label for="reference_code" class="form-label">Reference code</label>
            <input type="text" class="form-control" id="reference_code" name="reference_code" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Ticket</button>
    </form>
</div>

</x-app-layout>
