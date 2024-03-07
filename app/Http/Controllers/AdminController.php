<?php

namespace App\Http\Controllers;

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

        return view('admin.users', compact('users'));
    }

    public function suspend(User $user)
    {
        $user->status = 'banned';
        $user->save();

        return back()->with('success', 'User has been banned.');
    }



}
