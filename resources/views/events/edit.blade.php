<x-app-layout>
    <div class="container">
        <h2>Edit Event</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> There were some issues with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Event Name</label>
                <input type="text" name="name" class="form-control" value="{{ $event->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="datetime-local" name="start_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="datetime-local" name="end_date" class="form-control"
                    value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-3">
                <label for="is_virtual" class="form-label">Is Virtual?</label>
                <select name="is_virtual" class="form-control" required>
                    <option value="0" {{ $event->is_virtual == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $event->is_virtual == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <select name="venue_id" class="form-control" required>
                <option value="">-- Select Venue --</option>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}" {{ $event->venue_id == $venue->id ? 'selected' : '' }}>
                        {{ $venue->name }} ({{ $venue->city ?? '' }})
                    </option>
                @endforeach
            </select>
            

            <div class="mb-3">
                <label for="room" class="form-label">Room (optional)</label>
                <input type="text" name="room" class="form-control" value="{{ $event->room }}" >
            </div>

            <select name="organizer_id" class="form-control" required>
                <option value="">-- Select Organizer --</option>
                @foreach ($organizers as $organizer)
                    <option value="{{ $organizer->id }}" {{ $event->organizer_id == $organizer->id ? 'selected' : '' }}>
                        {{ $organizer->name }} ({{ $organizer->email }})
                    </option>
                @endforeach
            </select><br>
            

            <select name="status" class="form-control" required>
                <option value="">-- Select Status --</option>
                <option value="Draft" {{ $event->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                <option value="Active" {{ $event->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Cancelled" {{ $event->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</x-app-layout>
