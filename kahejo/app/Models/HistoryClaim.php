<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryClaim extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'reward_id',
    ];

    /**
     * Get the user that owns the history claim.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the achievement associated with the history claim.
     */
    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }
}
