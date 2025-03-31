<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use App\Models\Venue;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Create test venue if it doesn't exist
        $venue = Venue::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Main Hall',
                'address' => '123 Event Street',
                'city' => 'Amsterdam',
                'country' => 'Netherlands',
                'capacity' => 500
            ]
        );

        $venue = Venue::firstOrCreate(
            ['id' => 2],
            [
                'name' => 'Philips Stadion',
                'address' => 'Frederiklaan 10A, 5616 LX Eindhoven',
                'city' => 'Eindhoven',
                'country' => 'Netherlands',
                'capacity' => 35000
            ]
        );

        // Create test user (organizer) if it doesn't exist
        $user = User::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Event Organizer',
                'email' => 'organizer@example.com',
                'password' => bcrypt('password'), // Default password
            ]
        );

        // Create sample events
        Event::create([
            'name' => 'Tech Conference 2025',
            'description' => 'A conference about the future of technology.',
            'start_date' => '2025-05-01 09:00:00',
            'end_date' => '2025-05-03 17:00:00',
            'is_virtual' => false,
            'venue_id' => $venue->id,
            'room' => 'Room A',
            'organizer_id' => $user->id,
            'status' => 'Published',
        ]);

        Event::create([
            'name' => 'Startup Pitch Night',
            'description' => 'An evening where startups pitch to investors.',
            'start_date' => '2025-06-15 18:00:00',
            'end_date' => '2025-06-15 22:00:00',
            'is_virtual' => true,
            'venue_id' => $venue->id,
            'room' => 'Virtual Room 1',
            'organizer_id' => $user->id,
            'status' => 'Draft',
        ]);

        Event::create([
            'name' => 'World Cup 2026',
            'description' => 'Football',
            'start_date' => '2026-06-11 18:00:00',
            'end_date' => '2026-07-19 22:00:00',
            'is_virtual' => false,
            'venue_id' => $venue->id,
            'room' => 'A Side',
            'organizer_id' => $user->id,
            'status' => 'Draft',
        ]);
    }
}
