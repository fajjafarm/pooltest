<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ThermalCheck extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'thermal_suite_id',
        'user_id',
        'checked_at',
        'status',
        'notes'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::ulid();
            }
        });
    }

    public function thermalSuite()
    {
        return $this->belongsTo(ThermalSuite::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function statusOptions()
    {
        return [
            'occupied_okay' => 'Occupied - Okay',
            'occupied_issue' => 'Occupied - Issue',
            'not_occupied_okay' => 'Not Occupied - Okay',
            'not_occupied_issue' => 'Not Occupied - Issue'
        ];
    }
}