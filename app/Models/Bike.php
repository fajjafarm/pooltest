<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['type', 'status'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

// app/Models/Rental.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = ['bike_id', 'order_number', 'name', 'duration', 'helmet_borrowed', 'lock_borrowed'];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}