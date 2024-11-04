<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Tweet;

class ProfileTweetsController extends Controller
{
    public function index(User $user): Response
    {
        // $tweet = new Tweet();
        // $tweet->id = 2;
        // $tweet->user_id = 1;
        // $tweet->message = 'Creating from code';
        // $tweet->likes = 0;
        // $tweet->created_at = '2024-11-04 15:57:32';
        // $tweet->updated_at = '2024-11-04 15:57:32';
        // $tweet = new Tweet([
        //     // 'id' => 3,
        //     "user_id" => 1,
        //     'message' => 'message',
        //     // 'likes' => 0,
        //     // 'created_at' => '2024-11-04 15:57:32',
        //     // 'updated_at' => '2024-11-04 15:57:32'
        // ]);
        // $tweet->save();

        return Inertia::render('ProfileTweets', [
            'tweets' => Tweet::with('user')->where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
