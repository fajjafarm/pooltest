<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Employee extends Authenticatable
{
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'first_name',  // Changed from 'name'
        'surname',     // Added
        'email', 
        'password', 
        'start_date', 
        'end_date', 
        'position'
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

    // Add a computed property for full name if needed
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->surname}";
    }

    public function qualifications()
    {
        return $this->hasMany(Qualification::class);
    }

    public function trainingSessions()
    {
        return $this->belongsToMany(TrainingSession::class)
            ->withPivot('comments');
    }
}