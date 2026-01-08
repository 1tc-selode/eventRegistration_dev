<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //fix esemenyek:
        $events = [
            ['title' => 'Music Festival', 'description' => 'A grand music festival featuring various artists.', 'date' => now()->addDays(10), 'location' => 'Central Park', 'max_attendees' => 500],
            ['title' => 'Art Exhibition', 'description' => 'An exhibition showcasing contemporary art.', 'date' => now()->addDays(20), 'location' => 'City Art Gallery', 'max_attendees' => 200],
            ['title' => 'Tech Conference', 'description' => 'A conference discussing the latest in technology.', 'date' => now()->addDays(30), 'location' => 'Convention Center', 'max_attendees' => 300],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        Event::factory()->count(10)->create();
        $this->command->info('Event seed: 13 esemény létrehozva. (3 fix, 10 random)');
    }
}
