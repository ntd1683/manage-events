<?php

use App\Models\Notify;
use App\Models\Option;
use Illuminate\Database\Eloquent\Collection;

if (!function_exists('option')) {
    function option($name, $default = '')
    {
        try {
            $option = Option::query();
            $value = $option->where('name', $name)->firstOrFail()->value;
        } catch (\Exception $e) {
            $value = $default;
        }
        return $value;
    }
}

if (!function_exists('optionSave')) {
    function optionSave($name, $value): void
    {
        $option = Option::query()->firstOrNew([
            'name' => $name,
        ], $attributes = [
            'value' => $value,
        ]);

        if ($option->exists) {
            $option->fill($attributes);
        }

        $option->save();
    }
}

if (!function_exists('getNameRouteMain')) {
    function getNameRouteMain(): string
    {
        return explode('.', request()->route()->getName())[0];
    }
}

if (!function_exists('getNotify')) {
    function getNotify(): Collection|array
    {
        return Notify::query()->where('author', auth()->user()->id)->get();
    }
}
