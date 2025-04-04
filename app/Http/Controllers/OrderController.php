<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Toon het bestelformulier met winkelmandje
    public function showOrderForm()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateCartTotal($cart);
        $ticketTypes = TicketType::all();

        return view('orders.form', compact('cart', 'total', 'ticketTypes'));
    }

    // Voeg toe aan winkelmandje
    public function addToCart(Request $request)
    {
        $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $ticketType = TicketType::findOrFail($request->ticket_type_id);

        if ($request->quantity > $ticketType->quantity) {
            return back()->with('error', 'Not enough tickets available!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$ticketType->id])) {
            $cart[$ticketType->id]['quantity'] += $request->quantity;
        } else {
            $cart[$ticketType->id] = [
                'id' => $ticketType->id,
                'name' => $ticketType->name,
                'price' => $ticketType->price,
                'quantity' => $request->quantity,
                'event' => $ticketType->event->name
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Ticket added to cart!');
    }

    // Verwijder uit winkelmandje
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Ticket removed from cart.');
    }

    public function processOrder(Request $request)
    {
        // Zorg ervoor dat ticket_types een array is
        $ticketTypes = is_array($request->ticket_types) ? $request->ticket_types : [];

        // Valideer de input
        $validated = $request->validate([
            'email' => 'required|email',
            'payment_method' => 'required|string',
            'ticket_types' => 'required|array',
            'ticket_types.*' => 'required|integer|min:1'
        ]);

        // Bereken totaalprijs
        $totalPrice = $this->calculateTotal($validated['ticket_types']);

        // Maak order aan
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'paid',
            'total_price' => $totalPrice,
        ]);

        // Voeg tickets toe
        foreach ($validated['ticket_types'] as $ticketId => $quantity) {
            $ticketType = TicketType::findOrFail($ticketId);
            $order->ticketTypes()->attach($ticketType->id, [
                'quantity' => $quantity,
                'price' => $ticketType->price,
            ]);
        }

        // Leeg winkelwagen
        session()->forget('cart');

        return redirect()->route('orders.success', $order);
    }

    private function calculateTotal(array $ticketTypes): float
    {
        $total = 0;

        foreach ($ticketTypes as $ticketId => $quantity) {
            $ticket = TicketType::find($ticketId);
            if ($ticket) {
                $total += $ticket->price * $quantity;
            }
        }

        return $total;
    }
    public function showSuccess(Order $order)
    {
      
        return view('orders.success', [
            'order' => $order,
            'tickets' => $order->ticketTypes()->withPivot('quantity')->get()
        ]);
    }
    // Hulpfunctie voor totaalberekening
    private function calculateCartTotal($cart)
    {
        return array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
