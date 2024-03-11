<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard() {
        return view('admin.dashboard');
    }
    public function users()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $users = User::paginate(10);

        return view('admin.users', compact('users'));
    }

    public function suspend(User $user)
    {
        $user->status = 'banned';
        $user->save();

        return back()->with('success', 'User has been banned.');
    }

    public function unsuspend(User $user)
    {
        $user->status = 'active';
        $user->save();

        return back()->with('success', 'User has been authorized.');
    }

    public function events()
    {
        $events = Event::with('organiser.user')->where('status', 'pending')->get();
        return view('admin.events', compact('events'));
    }

    public function eventsReview(Event $event, $status)
    {
        $event->status = $status;
        $event->save();

        return redirect()->back()->with('success', 'Event status updated successfully.');
    }

}
