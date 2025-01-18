<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['type', 'status'];

    public function bike_rentals()
    {
        return $this->hasMany(Rental::class);
    }
}

