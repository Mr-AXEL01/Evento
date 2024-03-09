<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganiserController extends Controller
{
    public function dashboard()
    {
        return view('organiser.dashboard');
    }

    public function events()
    {
        $organiserId = Auth::user()->organiser->id;
        $events = Event::where('organiser_id', $organiserId)->get();
        return view('organiser.events', compact('events'));
    }
}
