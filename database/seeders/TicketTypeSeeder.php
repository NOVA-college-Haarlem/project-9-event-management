<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        TicketType::insert([
            [
                'event_id' => 1,  // Zorg ervoor dat dit overeenkomt met een bestaand event_id
                'name' => 'Standard Ticket',
                'price' => 25.00,
                'quantity' => 100,
                'sales_start' => now(),
                'sales_end' => now()->addMonth(1),
                'description' => 'General access to the event.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 1,  // Zorg ervoor dat dit overeenkomt met een bestaand event_id
                'name' => 'VIP Ticket',
                'price' => 50.00,
                'quantity' => 50,
                'sales_start' => now(),
                'sales_end' => now()->addMonth(1),
                'description' => 'Access to VIP areas and extra perks.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 2,  // Zorg ervoor dat dit overeenkomt met een bestaand event_id
                'name' => 'Early Bird Ticket',
                'price' => 20.00,
                'quantity' => 200,
                'sales_start' => now(),
                'sales_end' => now()->addMonth(1),
                'description' => 'Special discount for early buyers.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
