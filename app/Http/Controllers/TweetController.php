<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\TweetResource;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tweets_data = Tweet::orderBy('created_at', 'DESC')->with('user')->paginate(20);

        if ($request->wantsJson()) {
            return TweetResource::collection($tweets_data);
        }

        return Inertia::render('Tweets', [
            'tweets' => TweetResource::collection($tweets_data)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $is_validated = $request->validate([
            'message' => 'required|string|min:1|max:255',
        ]);

        $request->user()->tweets()->create($is_validated);

        return redirect(route('tweets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tweet $tweet)
    {
        Gate::authorize('update', $tweet);
        $is_validated = $request->validate([
            'message' => 'required|string|max:255'
        ]);

        $tweet->update($is_validated);

        return redirect(route('tweets'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Tweet $tweet): RedirectResponse
    {
        Gate::authorize('delete', $tweet);
        $tweet->delete($request);
        return redirect(route('tweets'));
    }
}
