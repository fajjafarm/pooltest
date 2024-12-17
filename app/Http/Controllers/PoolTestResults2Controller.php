<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoolTestResults2Controller extends Controller 
{ 
    public function article() { 
        return view('pooltests', ['article' => 
                  'Passing Data to View']); 
    } 
} 