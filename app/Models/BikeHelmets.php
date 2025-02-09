<?php 
namespace App\Models;
use App\Models\BikeRental;

use Illuminate\Database\Eloquent\Model;

class BikeHelmets extends Model
{
    protected $fillable = ['status'];

    public function bike_helmetss()
    {
        return $this->hasMany(BikeRental::class);
    }
}

