<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAttendance extends Model
{
    use HasFactory;

    protected $table = 'event_attendances';

    protected $fillable = [
        'register_event_id',
        'event_id',
    ];
}
