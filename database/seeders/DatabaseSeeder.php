<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => "Jhalak Dhami",
            'email' => "jhalakisme@gmail.com",
            'password' => "12345678",
            'email_verified_at' => date('Y-m-d h:i:sa'),
        ]
        );

        $this->call([
            ContactSeeder::class
        ]);
        $this->call([
            SettingSeeder::class
        ]);
    }
}
