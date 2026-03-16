<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@drintan.com'],
            [
                'name' => 'Admin Dr Intan',
                'password' => 'admin12345',
            ]
        );

        $this->call([
            ContentBlockSeeder::class,
            PromotionSeeder::class,
            ServiceSeeder::class,
        ]);
    }
}
