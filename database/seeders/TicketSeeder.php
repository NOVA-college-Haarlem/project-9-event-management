<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Ticket::insert([
            [
                'event_id' => 1,
                'user_id' => 1,
                'status' => 'confirmed',
                'purchase_date' => now(),
                'reference_code' => 'ABC123',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'event_id' => 2,
                'user_id' => 2,
                'status' => 'pending',
                'purchase_date' => now(),
                'reference_code' => 'XYZ456',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
