<?php

use App\Models\Option;

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
