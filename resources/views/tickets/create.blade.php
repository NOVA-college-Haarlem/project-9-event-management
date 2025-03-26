@section('content')
<div class="container">
    <h2>Nieuw Ticket Aanmaken</h2>
    
    <form action="{{ route('Tickets.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="event_id" class="form-label">Event</label>
            <select class="form-control" id="event_id" name="event_id" required>
                <option value="">-- Selecteer Event --</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Gebruiker</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="">-- Selecteer Gebruiker --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ticket_type_id" class="form-label">Ticket Type</label>
            <select class="form-control" id="ticket_type_id" name="ticket_type_id" required>
                <option value="">-- Selecteer Ticket Type --</option>
                @foreach($ticketTypes as $ticketType)
                    <option value="{{ $ticketType->id }}">{{ $ticketType->name }} (€{{ $ticketType->price }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="pending">In afwachting</option>
                <option value="confirmed">Bevestigd</option>
                <option value="canceled">Geannuleerd</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="purchase_date" class="form-label">Aankoopdatum</label>
            <input type="datetime-local" class="form-control" id="purchase_date" name="purchase_date" required>
        </div>

        <div class="mb-3">
            <label for="reference_code" class="form-label">Referentiecode</label>
            <input type="text" class="form-control" id="reference_code" name="reference_code" required>
        </div>

        <button type="submit" class="btn btn-primary">Ticket Aanmaken</button>
    </form>
</div>
@endsection
