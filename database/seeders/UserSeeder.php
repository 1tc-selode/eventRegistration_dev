<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@events.hu',
            'password'=>Hash::make('admin123'),
            'is_admin' => true,
        ]);

        User::factory()->count(10)->create();

        $this->command->info('User seed 12 felhasználó létrehozva. (1 admin, 10 random)');
    }
}
