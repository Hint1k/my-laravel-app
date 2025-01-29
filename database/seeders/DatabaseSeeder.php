<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(10)->create([ // creating 10 random users with command: php artisan db:seed
//            'name' => 'Test User', // creating a specific user with specific email
//            'email' => 'test@example.com',
        ]);
        Task::factory(20)->create(); // repopulating both tables: php artisan migrate:refresh --seed
        User::factory(2)->unverified()->create(); // creating two users with unverified emails
    }
}
