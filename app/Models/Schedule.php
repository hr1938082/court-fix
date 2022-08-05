<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'UUID',
        'title',
        'isAllDay',
        'start',
        'end',
        'category',
        'dueDateClass',
        'color',
        'bgColor',
        'dragBgColor',
        'borderColor',
        'location',
        'isPrivate',
        'calendarId',
        'user_id'
    ];
}
