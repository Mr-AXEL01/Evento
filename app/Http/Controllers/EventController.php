<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function create() {
        $categories = Category::all();
        return view('organiser.create_event' , compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'location' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'place' => ['required', 'integer', 'min:1'],
            'category' => ['required'],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        $coverName = time() . '.' . $request->file('cover')->extension();
        $request->file('cover')->storeAs('public/image', $coverName);

        $organiserID = Auth::id();

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'place' => $request->place,
            'cover' => $coverName,
            'organiser_id' => $organiserID,
        ]);

        return redirect()->route('organiser.events')->with('success', 'Event created successfully.');
    }
}
