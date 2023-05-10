<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    public function create(): View
    {
        return view('events.create');
    }
    //
}
