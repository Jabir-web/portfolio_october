<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PremiumMember extends Model
{
     protected $fillable = [
        'user_id',
        'plan',
        'start_date',
        'end_date',
        'status',
    ];

    // relation with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
