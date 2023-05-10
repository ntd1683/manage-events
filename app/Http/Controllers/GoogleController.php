<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function index()
    {
        return view('events.google.import');
    }
}
