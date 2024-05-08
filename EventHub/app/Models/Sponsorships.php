<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorships extends Model
{
    use HasFactory;

    protected $fillable = [
        'sponsorName',
        'sponsorDescription',
        'sponsorAmount'
    ];
}
