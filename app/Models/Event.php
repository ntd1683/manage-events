<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'content',
        'author',
        'google_sheet',
        'media_id',
    ];

    protected $appends = [
        'media',
    ];

    protected function media(): Attribute
    {
        return Attribute::get(function () {
            $media = '';
            if($this->media_id) {
                $media = Media::query()->where('id', $this->media_id)->first()->url;
            }
            return $media;
        })->shouldCache();
    }
}
