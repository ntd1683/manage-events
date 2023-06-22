<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChangeLanguageController extends Controller
{
    public function __invoke(Request $request)
    {
        $language = $request->get('language') ?: 'en';
        Session::put('lang', $language);

        return redirect()->back()->with('success', trans('Change Language Successfully'));
    }
}
