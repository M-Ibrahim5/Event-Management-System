<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'eventName',
        'eventDescription',
        'eventLocation',
        'eventCategory',
        'eventStartDate',
        'eventEndDate',
        'eventStartTime',
        'eventEndTime',
        'eventPrice',
        'eventCapacity',
        'eventStatus',
        'email', // Assuming this is the user's email associated with the event
        'sponsor',
        'sponsorStatus',
        'imagePath',
    ];
    
    
    protected $casts = [
        'eventStartDate' => 'datetime',
        'eventStartTime' => 'datetime',
        'eventEndDate' => 'datetime',
        'eventEndTime' => 'datetime',
    ];
}
