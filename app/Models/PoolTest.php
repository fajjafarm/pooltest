<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
public $timestamps = false;
class PoolTest extends Model
{
    
    protected $fillable = ['user_id', 'pool_id', 'dpd1', 'dpd3', 'ccl', 'ph', 'comments'];
}