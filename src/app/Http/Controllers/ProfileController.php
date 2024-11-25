<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function bioUpdate(Request $request)
    {
        $validated = $request->validate([
            'bio' => 'nullable|string|min:1|max:255'
        ]);

        $request->user()->fill($validated);
        $request->user()->save();

        return redirect(route('profilePage.show', Auth::id()));
    }

    public function imageUpdate(Request $request, User $user)
    {
        // Storage::disk('local')->put('', '');
        // $request->file('image')->store('public');

        dd($request);
        $imagePath = Storage::putFile('image', $request->file('image'));

        $request->user()->fill([
            'image' => $imagePath,
        ]);
        $request->user()->save();

        return redirect(route('profilePage.show', Auth::id()));
    }
}
