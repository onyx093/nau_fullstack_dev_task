<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserProfileSettingsController extends Controller
{
    public function edit()
    {
        return Inertia::render('UserProfile', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|digits:11',
            'country' => 'required|string|max:50',
            // 'password' => ['sometimes', 'required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::user();

        $user->name = $request->fullname;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->save();

        return Redirect::route('dashboard');
    }
}
