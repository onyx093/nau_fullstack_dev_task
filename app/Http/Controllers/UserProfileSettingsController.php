<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserProfileSettingsController extends Controller
{
    public function index()
    {
        return Inertia::render('UserProfile');
    }
}
