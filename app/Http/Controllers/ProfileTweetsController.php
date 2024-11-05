<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileTweetResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Tweet;

class ProfileTweetsController extends Controller
{
    public function index(): Response
    {
        $tweets_id = Tweet::orderBy('created_at', 'DESC')->with('user')->where('user_id', Auth::id())->paginate(20);

        return Inertia::render('ProfileTweets', [
            'tweets' => ProfileTweetResource::collection($tweets_id)
        ]);
    }
}
