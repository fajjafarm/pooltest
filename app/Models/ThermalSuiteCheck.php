<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThermalSuiteCheck extends Model
{
    protected $fillable = [
        'thermal_suite_id',
        'user_id',
        'status',
        'extra_info',
        'checked_at'
    ];

    public function thermalSuite()
    {
        return $this->belongsTo(ThermalSuite::class, 'thermal_suite_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
