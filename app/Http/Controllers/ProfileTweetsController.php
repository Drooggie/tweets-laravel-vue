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
        return Inertia::render('Profile/ProfileShow', [
            'user' => User::findOrFail(Auth::id()),
            'tweets' => Tweet::where('user_id', Auth::id())->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->latest()->get()
        ]);
    }

    public function show(int $id)
    {
        return Inertia::render('Profile/ProfileShow', [
            'user' => User::findOrFail($id),
            'tweets' => Tweet::where('user_id', $id)->with(['user' => function ($query) {
                $query->select('id', 'name');
            }])->latest()->get()
        ]);
    }
}
