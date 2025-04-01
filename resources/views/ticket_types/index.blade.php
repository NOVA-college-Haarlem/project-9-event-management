<x-app-layout>
    <div class="container">
        <h2>All Ticket Types</h2>
    
        <a href="{{ route('ticket_types.create') }}" class="btn btn-primary mb-3">Create New Ticket Type</a>
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Available</th>
                    <th>Sales Period</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ticket_types as $ticketType)
                <tr>
                    <td>{{ $ticketType->id }}</td>
                    <td>{{ $ticketType->event->name }}</td>
                    <td>{{ $ticketType->name }}</td>  <!-- name of the ticket type -->
                    <td>€{{ number_format($ticketType->price, 2) }}</td>
                    <td>{{ $ticketType->quantity }}</td>  <!-- Available quantity -->
                    <td>
                        {{ $ticketType->sales_start->format('d/m/Y H:i') }} -<br>
                        {{ $ticketType->sales_end->format('d/m/Y H:i') }}
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('ticket_types.edit', $ticketType->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <!-- Delete Button -->
                        <form action="{{ route('ticket_types.delete', $ticketType->id) }}" method="POST" class="d-inline">
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
