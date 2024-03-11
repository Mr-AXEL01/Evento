<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => ['required', 'exists:customers,id'],
            'event_id' => ['required', 'exists:events,id'],
        ]);

        $event = Event::findOrFail($request->event_id);

        if ($event->place <= 0) {
            return redirect()->back()->with('error', 'No available places for this event.');
        }

        $reservationData = [
            'customer_id' => $request->customer_id,
            'event_id' => $request->event_id,
        ];

        if ($event->reservation_mode === 'automatic') {
            $reservationData['status'] = 'approved';
        }

        $event->decrement('place');

        Reservation::create($reservationData);

        return redirect()->back()->with('success', 'Reservation created successfully.');
    }

}
