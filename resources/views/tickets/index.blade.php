//index.blade.tickets
<x-app-layout>
    <div class="container py-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gradient">
                <i class="fas fa-ticket-alt mr-3"></i>All Tickets
            </h1>
            @auth
            @if(auth()->user()->is_admin)
                <a href="{{ route('tickets.create') }}" class="btn-action btn-primary">
                    <i class="fas fa-plus-circle mr-2"></i>Create a Ticket
                </a>
            @endif
        @endauth
            <a href="{{ route('ticket_types.index') }}" class="btn-action btn-primary">
                <i class="fas fa-plus-circle mr-2"></i>Ticket Types bekijken
            </a>
        </div>
        <br>

        <!-- Tickets Table -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="overflow-x-auto">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Purchase Date</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->ticket_id }}</td>
                            <td>
                                <a href="{{ route('events.index', $ticket->event->id) }}" class="text-primary hover:underline">
                                    {{ $ticket->event->name }}
                                </a>
                            </td>
                            <td>{{ $ticket->user->name }}</td>
                            <td>
                                <span class="status-badge status-{{ $ticket->status }}">
                                    <i class="fas 
                                        {{ $ticket->status === 'active' ? 'fa-check-circle' : 'fa-clock' }} 
                                        mr-1"></i>
                                    {{ ucfirst($ticket->status) }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($ticket->purchase_date)->format('d M Y H:i') }}</td>
                            @if (auth()->user()->is_admin)
                                
                            <div class="flex space-x-3">
                                <a href="{{ route('tickets.edit', $ticket->ticket_id) }}"
                                   class="action-btn btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('tickets.delete', $ticket->ticket_id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn btn-delete" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .text-gradient {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        .status-active {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
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
        .btn-edit {
            background-color: #e0e7ff;
            color: #4338ca;
        }
        .btn-edit:hover {
            background-color: #c7d2fe;
        }
        .btn-delete {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        .btn-delete:hover {
            background-color: #fecaca;
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
        .styled-table tbody tr:hover {
            background-color: #f8fafc;
        }
        .styled-table td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .text-primary {
            color: #4361ee;
        }
    </style>
</x-app-layout>