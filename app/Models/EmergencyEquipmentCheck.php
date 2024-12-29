<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyEquipmentCheck extends Model
{
    protected $fillable = ['equipment_type', 'equipment_location', 'check_date', 'condition', 'comments'];
}