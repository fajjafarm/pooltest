<?php 
// app/Models/Rental.php
namespace App\Models;
use Illuminate\Support\Str;
use App\Models\Bike;

use Illuminate\Database\Eloquent\Model;

class BikeRental extends Model
{
    protected $table = 'bike_rentals';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::ulid();
        });
    }
    protected $fillable = ['ulid','bike_id', 'order_number', 'name', 'duration', 'helmet_borrowed', 'lock_borrowed'];
    

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}