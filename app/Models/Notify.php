<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $table = "notify";

    public $timestamps = true;

    protected $fillable = [
        'title',
        'icon',
        'content',
        'author',
    ];
}
