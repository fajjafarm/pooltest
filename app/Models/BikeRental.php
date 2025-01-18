<?php 
// app/Models/Rental.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BikeRental extends Model
{
    protected $fillable = ['bike_id', 'order_number', 'name', 'duration', 'helmet_borrowed', 'lock_borrowed'];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}