<x-app-layout>
    <div class="container py-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-gradient">
                <i class="fas fa-ticket-alt mr-3"></i>Ticket Types
            </h1>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('ticket_types.create') }}" class="btn-action btn-primary">
                        <i class="fas fa-plus-circle mr-2"></i>Create Ticket Type
                    </a>
                @endif
            @endauth
        </div>
        <br>
        @if ($ticket_types->isEmpty())
            <div class="alert alert-info">
                <i class="fas fa-info-circle mr-2"></i>No ticket types available yet.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($ticket_types as $ticketType)
                <div class="ticket-type-card">
                    <!-- Card content remains the same -->
                    <div class="card-header">
                        <h3 class="ticket-name">{{ $ticketType->name }}</h3>
                        <div class="ticket-price">€{{ number_format($ticketType->price, 2) }}</div>
                    </div>
                    
                    <div class="card-body">
                        <div class="ticket-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar-day"></i>
                                <span>Event: {{ $ticketType->event->name }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-ticket"></i>
                                <span>Available: {{ $ticketType->quantity }}</span>
                            </div>
                        </div>
                        
                        <div class="sales-period">
                            <div class="period-title">Sales Period:</div>
                            <div class="period-dates">
                                <div class="date-item">
                                    <i class="fas fa-play-circle"></i>
                                    {{ $ticketType->sales_start->format('d M Y H:i') }}
                                </div>
                                <div class="date-item">
                                    <i class="fas fa-stop-circle"></i>
                                    {{ $ticketType->sales_end->format('d M Y H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-actions">
                        <div class="flex gap-2 w-full">
                            @auth
                                <!-- Add to Cart -->
                                <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="ticket_type_id" value="{{ $ticketType->id }}">
                                    <div class="flex items-center gap-2">
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $ticketType->quantity }}" 
                                               class="w-16 px-2 py-1 border rounded">
                                        <button type="submit" class="action-btn btn-add-to-cart w-full">
                                            <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                                        </button>
                                    </div>
                                </form>
                    
                                <!-- Alleen voor admins -->
                                @if(auth()->user()->is_admin)
                                    <!-- Edit Button -->
                                    <a href="{{ route('ticket_types.edit', $ticketType->id) }}" 
                                       class="action-btn btn-edit flex-1">
                                        <i class="fas fa-edit mr-2"></i>Edit
                                    </a>
                                    
                    
                                    <!-- Delete Button -->
                                    <form action="{{ route('ticket_types.delete', $ticketType->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn btn-delete w-full" 
                                                onclick="return confirm('Are you sure you want to delete this ticket type?')">
                                            <i class="fas fa-trash-alt mr-2"></i>Delete
                                        </button>
                                    </form>
                                @endif
                            @else
                                <!-- Login Button voor niet-ingelogde gebruikers -->
                                <a href="{{ route('login') }}" class="action-btn btn-add-to-cart flex-1">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Login to Purchase
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>

    <style>
        .text-gradient {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Main Styles */
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
            background-color: #e6f7ff;
            color: #00668c;
            border-left: 4px solid #00668c;
        }
        
        /* Card Styles */
        .ticket-type-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .ticket-type-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        
        .card-header {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            color: white;
            padding: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .ticket-name {
            font-size: 1.25rem;
            font-weight: 600;
            margin: 0;
        }
        
        .ticket-price {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Meta Information */
        .ticket-meta {
            margin-bottom: 1.5rem;
        }
        
        .meta-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            color: #4a5568;
        }
        
        .meta-item i {
            width: 24px;
            color: #718096;
            margin-right: 0.75rem;
        }
        
        /* Sales Period */
        .sales-period {
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 1rem;
        }
        
        .period-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4a5568;
        }
        
        .date-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.25rem;
            font-size: 0.9rem;
            color: #4a5568;
        }
        
        .date-item i {
            margin-right: 0.5rem;
            color: #718096;
        }
        
        /* Action Buttons */
        .card-actions {
            display: flex;
            padding: 0 1.5rem 1.5rem;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s;
            cursor: pointer;
            text-decoration: none;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4361ee 0%, #3f37c9 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }
        
        .btn-add-to-cart {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .btn-add-to-cart:hover {
            background-color: #bbf7d0;
        }
        
        .btn-cart {
            background-color: #fce7f3;
            color: #831843;
        }
        
        .btn-cart:hover {
            background-color: #fbcfe8;
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
    </style>
</x-app-layout>