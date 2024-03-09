<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create() {
        return view('organiser.create_event');
    }
}
