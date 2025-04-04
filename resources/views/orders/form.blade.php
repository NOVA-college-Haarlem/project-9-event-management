<x-app-layout>
    <div class="container py-8">
        <h1 class="text-3xl font-bold mb-6">Checkout</h1>
        
        @if(count($cart) == 0)
            <div class="bg-white rounded-lg shadow p-12 text-center" style="min-height: 300px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <p class="text-gray-500 mb-6 text-lg">Your cart is empty</p>
                <a href="{{ route('ticket_types.index') }}" class="btn-action btn-primary px-8 py-3 text-lg">
                    <i class="fas fa-ticket-alt mr-2"></i> Browse Tickets
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Summary -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow overflow-hidden">
                    <div class="p-4 border-b">
                        <h2 class="text-xl font-semibold">Your Order</h2>
                    </div>
                    
                    <div class="divide-y divide-gray-200">
                        @foreach($cart as $item)
                        <div class="p-4 flex justify-between items-center">
                            <div>
                                <h3 class="font-bold">{{ $item['name'] }}</h3>
                                <p class="text-gray-600 text-sm">{{ $item['event'] }}</p>
                                <div class="mt-2 flex items-center gap-4">
                                    <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">
                                            <i class="fas fa-trash mr-1"></i>Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-500">€{{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</p>
                                <p class="font-bold">€{{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="p-4 bg-gray-50 border-t">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">Total</h3>
                            <p class="font-bold text-xl">€{{ number_format($total, 2) }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Checkout Form -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Payment Information</h2>
                    
                    <form action="{{ route('orders.process') }}" method="POST" id="checkout-form">
                        @csrf
                        
                        <!-- Verborgen velden voor tickets als array -->
                        @foreach($cart as $item)
                            <input type="hidden" name="ticket_types[{{ $item['id'] }}]" value="{{ $item['quantity'] }}">
                        @endforeach
                        
                        <!-- Payment method -->
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Payment Method</label>
                            <select name="payment_method" class="w-full border rounded px-3 py-2" required>
                                <option value="">Select a payment method</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
                        
                        <!-- Customer details -->
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" 
                                   class="w-full border rounded px-3 py-2" required>
                        </div>
                        
                        <button type="submit" class="btn-action btn-primary w-full">
                            <i class="fas fa-credit-card mr-2"></i>Complete Order
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <!-- Optioneel: JavaScript voor form validatie -->
    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            // Voeg hier eventuele client-side validatie toe
            console.log('Form submitted with data:', Object.fromEntries(new FormData(this)));
        });
    </script>
</x-app-layout>