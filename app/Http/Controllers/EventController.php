<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function register() 
    {
        return view('events.register');
    }
    //
}
