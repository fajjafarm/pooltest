<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThermalArea extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default (optional)
    protected $table = 'thermal_suites';

    // Define fillable properties for mass assignment
    protected $fillable = [
        'thermal_name',
        'thermal_type',
    ];

    // Relationship with ThermalCheck
    public function thermalChecks()
    {
        return $this->hasMany(ThermalCheck::class, 'thermal_area_id');
    }
}