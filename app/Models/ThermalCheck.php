<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThermalCheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'thermal_area_id', 'status', 'time_checked', 'user_id', 'issue_description'
    ];

    public function thermalArea()
    {
        return $this->belongsTo(ThermalArea::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}