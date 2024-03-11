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
        $events = Event::with('category')->where('organiser_id', $organiserId)->paginate(7);
        return view('organiser.events', compact('events'));
    }

    public function reservations()
    {
        $reservations = Reservation::with('customer.user' , 'category');
        return view('organiser.reservation',compact('reservations'));
    }
}
