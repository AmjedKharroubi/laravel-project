<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'breed', 'age', 'location', 
        'health_notes', 'feeding_schedule', 'status'
    ];
}
