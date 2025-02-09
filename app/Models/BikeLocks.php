<?php 
namespace App\Models;
use App\Models\BikeRental;

use Illuminate\Database\Eloquent\Model;

class BikeLocks extends Model
{
    protected $fillable = ['status'];

    public function bikelocks()
    {
        return $this->hasMany(BikeRental::class);
    }
}

