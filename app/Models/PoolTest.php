<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PoolTest extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'pool_id',
        'dpd1',
        'dpd3',
        'ph',
        'ccl',
        'user_id',
        'sample_location',
        'status',
        'action_taken'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::ulid();
            }
            // Calculate status based on results
            $model->status = $model->calculateStatus();
        });
    }

    public function pool()
    {
        return $this->belongsTo(PoolList::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    private function calculateStatus()
    {
        // Add your status calculation logic here
        // Example:
        if ($this->ccl < 0.5 || $this->ccl > 5.0 || $this->ph < 7.2 || $this->ph > 7.8) {
            return 'needs_attention';
        }
        return 'normal';
    }
}