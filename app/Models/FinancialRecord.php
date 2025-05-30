<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'amount', 'category', 
        'description', 'date', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
