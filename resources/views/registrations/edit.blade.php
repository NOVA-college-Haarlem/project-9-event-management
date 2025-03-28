<x-app-layout>
    <div class="max-w-2xl mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold mb-6">Edit Registration</h2>

        <form method="POST" action="{{ route('registrations.update', $registration->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">Status</label>
                <select name="status" class="mt-1 block w-full border-gray-300 rounded shadow-sm">
                    <option value="pending" {{ $registration->status === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $registration->status === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="rejected" {{ $registration->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
