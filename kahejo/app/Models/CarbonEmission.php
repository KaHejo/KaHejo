<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarbonEmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'amount',
        'date',
    ];

    // Optional: If you want to cast date to Carbon instance
    protected $dates = ['date'];

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}