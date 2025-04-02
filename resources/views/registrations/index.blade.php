index.blade.register
<x-app-layout>
    <div class="container py-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gradient">
                <i class="fas fa-clipboard-list mr-3"></i>Registrations
            </h1>
            
            <div class="flex gap-3">
                <a href="{{ route('home') }}" class="btn-action btn-outline">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="{{ route('venues.index') }}" class="btn-action btn-outline">
                    <i class="fas fa-map-marked-alt mr-2"></i>Venues
                </a>
                <a href="{{ route('events.index') }}" class="btn-action btn-success">
                    <i class="fas fa-calendar-alt mr-2"></i>All Events
                </a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success mb-6">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif

        <!-- Search Form -->
        <form method="GET" action="{{ route('registrations.index') }}" class="search-form mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="search-input-group">
                    <i class="fas fa-search"></i>
                    <input type="text" name="event" placeholder="Search by Event" value="{{ request('event') }}"
                        class="form-input-search" />
                </div>
                
                <div class="search-input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}"
                        class="form-input-search" />
                </div>
                
                <div class="flex gap-3">
                    <button type="submit" class="btn-action btn-primary">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    <a href="{{ route('registrations.index') }}" class="btn-action btn-outline">
                        <i class="fas fa-sync-alt mr-2"></i>Reset
                    </a>
                </div>
            </div>
        </form>
        
        <!-- Registrations Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Event</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $registration)
                            <tr>
                                <td>
                                    <div class="flex items-center">
                                        <div class="avatar-placeholder mr-3">
                                            {{ substr($registration->user->name, 0, 1) }}
                                        </div>
                                        {{ $registration->user->name }}
                                    </div>
                                </td>
                                <td>{{ $registration->user->email }}</td>
                                <td>
                                    <a href="{{ route('events.index', $registration->event->id) }}" class="text-primary hover:underline">
                                        {{ $registration->event->name }}
                                    </a>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ $registration->status }}">
                                        <i class="fas 
                                            {{ $registration->status === 'approved' ? 'fa-check-circle' : 
                                               ($registration->status === 'rejected' ? 'fa-times-circle' : 'fa-clock') }} 
                                            mr-1"></i>
                                        {{ ucfirst($registration->status) }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($registration->registered_at)->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="flex space-x-3">
                                        <a href="{{ route('registrations.edit', $registration->id) }}"
                                           class="action-btn btn-edit" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('registrations.destroy', $registration->id) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this registration?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn btn-delete" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        /* Custom Styles */
        .text-gradient {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
        }
        
        .search-form {
            background: white;
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .search-input-group {
            position: relative;
        }
        
        .search-input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }
        
        .form-input-search {
            padding-left: 2.5rem;
            width: 100%;
            height: 2.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }
        
        .form-input-search:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .btn-action {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1.25rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            color: white;
            border: none;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .btn-success {
            background-color: #10b981;
            color: white;
            border: none;
        }
        
        .btn-success:hover {
            background-color: #0d9e6e;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }
        
        .btn-outline {
            background: white;
            border: 1px solid #e2e8f0;
            color: #64748b;
        }
        
        .btn-outline:hover {
            border-color: #4361ee;
            color: #4361ee;
            transform: translateY(-2px);
        }
        
        .avatar-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #4361ee;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }
        
        .btn-edit {
            background-color: #e0e7ff;
            color: #4338ca;
        }
        
        .btn-edit:hover {
            background-color: #c7d2fe;
            transform: scale(1.1);
        }
        
        .btn-delete {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        
        .btn-delete:hover {
            background-color: #fecaca;
            transform: scale(1.1);
        }
        
        .styled-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .styled-table thead th {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            color: white;
            padding: 1rem 1.5rem;
            text-align: left;
            font-weight: 600;
        }
        
        .styled-table tbody tr {
            transition: all 0.2s;
        }
        
        .styled-table tbody tr:hover {
            background-color: #f8fafc;
        }
        
        .styled-table td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }
        
        .styled-table tbody tr:last-child td {
            border-bottom: none;
        }
    </style>
</x-app-layout>