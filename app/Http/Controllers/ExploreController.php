<?php

namespace App\Http\Controllers;

use App\Models\Explore;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Explore');
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
    public function show(Explore $explore)
    {
        //
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