<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold mb-6">Registrations</h1>
        <div class="d-flex gap-2">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">🏠 Home</a>
            <a href="{{ route('venues.index') }}" class="btn btn-outline-primary">📍 Venues</a>
            <a href="{{ route('events.index') }}" class="btn btn-success">🎈 All Events</a>
        </div><br>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('registrations.index') }}" class="mb-6 flex flex-wrap gap-4">
            <input type="text" name="event" placeholder="Search by Event" value="{{ request('event') }}"
                   class="form-input border border-gray-300 rounded px-4 py-2 w-60" />
        
            <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}"
                   class="form-input border border-gray-300 rounded px-4 py-2 w-60" />
        
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="{{ route('registrations.index') }}" class="btn btn-outline-secondary">Reset</a>
        </form>
        
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($registrations as $registration)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $registration->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $registration->user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $registration->event->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <span class="inline-block px-2 py-1 rounded text-xs font-semibold
                                    {{ $registration->status === 'approved' ? 'bg-green-100 text-green-800' : ($registration->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($registration->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($registration->registered_at)->format('d M Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 space-x-2">
                                <a href="{{ route('registrations.edit', $registration->id) }}"
                                   class="text-indigo-600 hover:underline">Edit</a>

                                <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
