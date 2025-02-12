<?php 
namespace App\Models;
use App\Models\BikeRental;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = ['type', 'status'];

    public function bike_rentals()
    {
        return $this->hasMany(BikeRental::class);
    }
    public static function readyToHire()
    {
        return static::where('status', 'ready to hire')->pluck('id')->toArray();
    }
}

