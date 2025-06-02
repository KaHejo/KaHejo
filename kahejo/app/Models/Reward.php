<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'reward_name',
        'reward_description',
        'points_required',
        'reward_image',
        'stock'
    ];
}
