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
            'category' => ['required', 'exists:categories,id'],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        $coverName = time() . '.' . $request->file('cover')->extension();
        $request->file('cover')->storeAs('public/image', $coverName);

        $organiserID = Auth::user()->organiser->id;

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'date' => $request->date,
            'place' => $request->place,
            'cover' => $coverName,
            'organiser_id' => $organiserID,
            'category_id' => $request->category,
        ]);

        return redirect()->route('organiser.events')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('organiser.create_event', compact('event','categories'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'location' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'place' => ['required', 'integer', 'min:1'],
            'category' => ['required', 'exists:categories,id'],
            'cover' => ['image', 'mimes:jpeg,png,jpg,gif,webp'],
        ]);

        if ($request->hasFile('cover')) {
            $coverName = time() . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('public/image', $coverName);
            $event->cover = $coverName;
        }

        $event->title       = $request->title;
        $event->description = $request->description;
        $event->location    = $request->location;
        $event->date        = $request->date;
        $event->place       = $request->place;
        $event->category_id    = $request->category;
        $event->save();

        return redirect()->route('organiser.events')->with('success', 'Event updated successfully.');
    }
}
