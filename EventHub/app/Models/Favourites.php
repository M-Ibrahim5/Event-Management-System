<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    use HasFactory;
    protected $table = 'favourites';
    protected $fillable = [
        'email',
        'eventId',
    ];

    /* public function event(){
        return $this->belongsTo(Events::class, 'eventId','id');
    } */

    // Favourites model
    public function events()
    {
        return $this->belongsTo(Events::class, 'eventId');
    }
}
