<x-app-layout>
    <div class="container">
        <h2>Edit Ticket Type</h2>
    
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('ticket_types.update', $ticketType->id) }}" method="POST">
            @csrf
            @method('POST')
    
            <div class="mb-3">
                <label for="event_id" class="form-label">Event</label>
                <select class="form-control" id="event_id" name="event_id" required>
                    <option value="">-- Choose an Event --</option>
                    @foreach($events as $event)
                        <option value="{{ $event->id }}" {{ $ticketType->event_id == $event->id ? 'selected' : '' }}>
                            {{ $event->name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="name" class="form-label">Ticket Type Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $ticketType->name) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $ticketType->price) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $ticketType->quantity) }}" required>
            </div>
    
            <div class="mb-3">
                <label for="sales_start" class="form-label">Sales Start</label>
                <input type="datetime-local" class="form-control" id="sales_start" name="sales_start" value="{{ old('sales_start', $ticketType->sales_start->format('Y-m-d\TH:i')) }}">
            </div>
    
            <div class="mb-3">
                <label for="sales_end" class="form-label">Sales End</label>
                <input type="datetime-local" class="form-control" id="sales_end" name="sales_end" value="{{ old('sales_end', $ticketType->sales_end->format('Y-m-d\TH:i')) }}">
            </div>
    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $ticketType->description) }}</textarea>
            </div>
    
            <button type="submit" class="btn btn-primary">Update Ticket Type</button>
        </form>
    </div>
</x-app-layout>
