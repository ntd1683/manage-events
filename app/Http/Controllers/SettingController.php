<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        return view('setting.setting');
    }

    public function store(StoreSettingRequest $request): RedirectResponse
    {
        optionSave('site_name', $request->get('site_name'));

        if (option('site_logo')) {
            Storage::disk('public')->delete(option('site_logo'));
        }

        if ($request->hasFile('site_logo')) {
            $fileLogo = $request->file('site_logo');
            $nameFileLogo = 'logo_' . Str::random(5) . '.' . $fileLogo->extension();
            $filePathLogo = $fileLogo->storeAs('images', $nameFileLogo, 'public');

            optionSave('site_logo', $filePathLogo);
        }

        if (option('site_favicon')) {
            Storage::disk('public')->delete(option('site_favicon'));
        }

        if ($request->hasFile('site_favicon')) {
            $fileFavicon = $request->file('site_favicon');
            $nameFileFavicon = 'favicon_' . Str::random(5) . '.' . $fileFavicon->extension();
            $filePathFavicon = $fileFavicon->storeAs('images', $nameFileFavicon, 'public');

            optionSave('site_favicon', $filePathFavicon);
        }

        return redirect()->route('index')->with('success', 'Save Setting Successfully');
    }
}
