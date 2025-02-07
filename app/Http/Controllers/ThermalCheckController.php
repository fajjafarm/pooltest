<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThermalCheck;
use App\Models\ThermalArea;
use Illuminate\Support\Facades\Auth;

class ThermalCheckController extends Controller
{
    public function index()
    {
        $thermalAreas = ThermalArea::all();
        return view('thermal.check', compact('thermalAreas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'thermal_area_id' => 'required|exists:thermal_areas,id',
            'status' => 'required|in:Occupied - Okay,Empty - Okay,Issue Spotted,N/A (Closed)',
            'time_checked' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $check = ThermalCheck::create([
            'thermal_area_id' => $request->thermal_area_id,
            'status' => $request->status,
            'time_checked' => $request->time_checked,
            'user_id' => Auth::id(),
            'issue_description' => $request->input('issue_description', null),
        ]);

        return redirect()->route('thermal.checks.index')->with('success', 'Check logged successfully.');
    }
}