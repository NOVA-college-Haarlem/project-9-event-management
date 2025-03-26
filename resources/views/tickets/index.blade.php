<x-app-layout>
    <div class="container">
        <h2>All Tickets</h2>
    
        <a href="{{ route('tickets.create') }}" class="btn btn-primary mb-3">Create a Ticket</a>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event</th>
                    <th>User</th>
                    <th>Ticket Type</th>
                    <th>Status</th>
                    <th>Purchase date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->event->name }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->ticketType->name }}</td>
                    <td>{{ ucfirst($ticket->status) }}</td>
                    <td>{{ $ticket->purchase_date }}</td>
                    <td>
                        <a href="{{ route('Tickets.edit', $ticket) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('Tickets.delete', $ticket) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>