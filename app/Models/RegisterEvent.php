<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterEvent extends Model
{
    use HasFactory;

    protected $table = 'register_events';

    protected $fillable = [
        'name',
        'code_student',
        'class',
        'faculty',
        'phone',
        'email',
        'event_id',
        'type',
    ];
}
