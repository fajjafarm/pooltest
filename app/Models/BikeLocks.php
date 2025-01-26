<?php 
namespace App\Models;
use App\Models\BikeRental;

use Illuminate\Database\Eloquent\Model;

class BikeLock extends Model
{
    protected $fillable = ['status'];

    public function bike_locks()
    {
        return $this->hasMany(BikeRental::class);
    }
}

