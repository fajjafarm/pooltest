<?php

namespace App\Http\Controllers;

use App\Models\WaterBalanceTest;
use Illuminate\Http\Request;

class WaterBalanceTestController extends Controller
{
    public function submitWaterTest(Request $request)
    {
        // Validation would typically go here, e.g., 
        // $request->validate([...]);
        $water_balance = $request->input('alkalinity')+$request->input('calcium_hardness'),

        $waterTest = new WaterBalanceTest([
            'alkalinity' => $request->input('alkalinity'),
            'calcium_hardness' => $request->input('calcium_hardness'),
            'ph' => $request->input('ph'),
            'pool_id' => $request->input('pool_id'),
            'water_balance' => $water_balance;
            
        ]);

        $waterTest->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Water balance test submitted successfully.',
            'data' => $waterTest
        ]);
    }
}