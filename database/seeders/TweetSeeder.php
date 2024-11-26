<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\DB;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tweets = [];

        for ($i = 1; $i <= 100; $i++) {
            $tweets[] = [
                'user_id' => random_int(1, 200),
                'message' => fake()->sentence(),
                'likes' => fake()->numberBetween(0, 10000),
            ];
        }

        DB::table('tweets')->insert($tweets);
    }
}
