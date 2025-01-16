<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaterBalanceTest extends Model
{
    protected $fillable = [
        'alkalinity',
        'calcium_hardness',
        'ph',
        'pool_id',
        'water_balance',
        'logged_by'
    ];

    // If you want to define the relationship with the Pool model
    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }
}