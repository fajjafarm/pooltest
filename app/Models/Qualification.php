<?php
namespace App\Models;

use Illuminate\Support\Str;

class Qualification extends Model
{
    use \Illuminate\Database\Eloquent\Concerns\HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'employee_id', 'name', 'acquired_date', 'expiry_date'
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

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}