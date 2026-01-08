<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $events = Event::all();

        $sampleRegistrations = [
            ['user_id' => $users[1]->id, 'event_id' => $events[0]->id, 'status' => 'elfogadva', 'registered_at' => now()->subDays(3)],

            ['user_id' => $users[2]->id, 'event_id' => $events[1]->id, 'status' => 'függőben', 'registered_at' => now()->subDays(4)],

            ['user_id' => $users[3]->id, 'event_id' => $events[2]->id, 'status' => 'elutasítva', 'registered_at' => now()->subDays(1)],
        ];

        foreach ($sampleRegistrations as $registration) {
            Registration::create($registration);
        }

        foreach ($users as $user) {
            $randomEvents = $events->random(rand(1, 3));

            foreach($randomEvents as $event) {
                $exists = Registration::where('user_id', $user->id)
                    ->where('event_id', $event->id)
                    ->exists();
            }

                if (!$exists) {
                    Registration::create([
                        'user_id' => $user->id,
                        'event_id' => $event->id,
                        'status' => 'függőben',
                        'registered_at' => now()->subDays(rand(1, 10)),
                    ]);
                }
        }

        $this->command->info('Registration seed: Regisztrációk létrehozva.');
    }
}
