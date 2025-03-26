<x-app-layout>
    <div class="container mt-4">
        <h2>Create Venue</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form method="POST" action="{{ route('venues.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input name="address" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">City</label>
                <input name="city" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Country</label>
                <input name="country" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Capacity</label>
                <input name="capacity" type="number" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Venue</button>
        </form>
    </div>
</x-app-layout>
