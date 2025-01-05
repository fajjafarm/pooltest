<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backwash extends Model
{
    protected $fillable = [
        'pool_id', 
        'pump1_before_pressure', 
        'pump1_after_pressure', 
        'basket1_cleaned',
        'pump2_before_pressure', 
        'pump2_after_pressure',
        'basket2_cleaned',
        'pump3_before_pressure', 
        'pump3_after_pressure',
        'basket3_cleaned',
        'reason_for_backwash',
        'issues',
        'performed_by'
    ];
}