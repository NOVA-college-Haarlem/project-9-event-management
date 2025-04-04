<x-app-layout>
    <div class="container py-12 relative">
        <!-- Home link in the top-left corner -->
        <a href="{{ route('home') }}" class="absolute top-0 left-0 mt-4 ml-4 text-blue-500 hover:underline flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Home
        </a>

        <div class="bg-white rounded-lg shadow-lg p-8 max-w-3xl mx-auto text-center">
            <div class="text-green-500 text-6xl mb-6">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="text-3xl font-bold mb-4">Order Successful!</h1>
            <p class="text-gray-600 mb-6">Thank you for your purchase. Your order #{{ $order->id }} has been confirmed.</p>
            
            <div class="bg-gray-50 rounded-lg p-6 mb-8 text-left">
                <h2 class="text-xl font-semibold mb-4">Order Summary</h2>
                @foreach($order->ticketTypes as $ticket)
                <div class="flex justify-between py-2 border-b">
                    <span>{{ $ticket->name }} (x{{ $ticket->pivot->quantity }})</span>
                    <span>€{{ number_format($ticket->pivot->price * $ticket->pivot->quantity, 2) }}</span>
                </div>
                @endforeach
                <div class="flex justify-between font-bold text-lg mt-4">
                    <span>Total:</span>
                    <span>€{{ number_format($order->total_price, 2) }}</span>
                </div>
            </div>

            <h2 class="text-lg font-semibold mb-4">Do you have any feedback for us?</h2>
            <div class="flex justify-center space-x-6">
                {{-- <a href="{{ route('feedback.create') }}" class="btn-action btn-primary text-sm px-5 py-2 rounded inline-flex items-center"> --}}
                    <i class="fas fa-comment-alt mr-2"></i> Yes
                </a>
                <a href="{{ route('home') }}" class="btn-action btn-secondary text-sm px-5 py-2 rounded inline-flex items-center">
                    <i class="fas fa-home mr-2"></i> No
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
