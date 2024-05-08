<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['stripe_id', 'amount', 'currency', 'status'];
    
    // If you need to define any relationships or additional methods, you can do so here
}
