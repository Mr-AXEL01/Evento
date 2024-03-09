<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganiserController extends Controller
{
    public function dashboard()
    {
        return view('organiser.dashboard');
    }
}
