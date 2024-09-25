<?php

namespace Database\Seeders;

use App\Models\products;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        products::create([
            'p_name'=>'Spinach',
            'image'=>'images/1.jpg',
            'description'=>'U CAN BUY AND COOK FOR UNDERAGE MOIMOI AND THEN NEFLIX AND CHILL...',
            'mass'=>'100',
            'price'=>'3',
        ]);

        products::create([
            'p_name'=>'Pumpkin',
            'image'=>'images/2.webp',
            'description'=>'U CAN BUY AND COOK FOR UNDERAGE MOIMOI AND THEN NEFLIX AND CHILL...',
            'mass'=>'100',
            'price'=>'4',
        ]);
    }
}
