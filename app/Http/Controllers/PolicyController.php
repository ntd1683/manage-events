<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PolicyController extends Controller
{
    public function privacy(): View
    {
        return view('policy.privacy');
    }

    public function termOfUse(): View
    {
        return view('policy.term-of-use');
    }
}
