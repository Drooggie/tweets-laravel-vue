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
        return Inertia::render('ProfileTweets', [
            'tweets' => Tweet::with('user:id, name')->where('user_id', Auth::id())->latest()->get()
        ]);
    }
}
