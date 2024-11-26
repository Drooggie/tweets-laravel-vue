<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Tweet $tweet)
    {
        if ($request->wantsJson()) {
            return Comment::where('tweet_id', $tweet->id)->latest()->get();
        }
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
    public function store(Request $request, Tweet $tweet): RedirectResponse
    {

        $content = $request->validate([
            'comment' => 'required|string|max:250',
        ])['comment'];

        $comment = new Comment();
        $comment->tweet_id = $tweet->id;
        $comment->content = $content;
        $comment->save();

        // $request->tweet()->comment()->create($is_validated);

        return redirect(route('tweets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
