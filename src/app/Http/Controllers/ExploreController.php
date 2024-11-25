<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use App\Models\Tweet;
use App\Http\Resources\TweetResource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {
        $tweets_data = Tweet::with(['user' => function ($query) {
            $query->select('id', 'name');
        }])->latest()->paginate(10);

        if ($request->wantsJson()) {
            return TweetResource::collection($tweets_data);
        }

        return Inertia::render('Explore', ['tweets' => $tweets_data]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $input = $request->input('search');

        $tweets_data = Tweet::where('message', 'like', '%' . $input . '%')->with(['user' => function ($query) {
            $query->select('id', 'name');
        }])->latest()->paginate(10);

        return Inertia::render('Explore', ['tweets' => $tweets_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Explore $explore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Explore $explore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Explore $explore)
    {
        //
    }
}
