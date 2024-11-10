<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(200)->create();


        $tweets = [];

        for ($i = 1; $i <= 100; $i++) {
            $tweets[] = [
                'user_id' => random_int(1, 200),
                'message' => fake()->sentence(),
                'likes' => fake()->numberBetween(0, 10000),
            ];
        }

        DB::table('tweets')->insert($tweets);
        DB::table('users')->insert([
            'name' => 'Bardon',
            'username' => 'Barucco',
            'email' => 'example@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
    }
}
