<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kit;
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

        User::factory()->create([
            'name' => 'Tomáš Musiol',
            'email' => 'tomas.musiol@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            //KitSeeder::class,
        ]);
    }
}
