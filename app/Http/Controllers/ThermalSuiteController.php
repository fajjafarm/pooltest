<?php

namespace App\Http\Controllers;

use App\Models\ThermalSuite;
use Illuminate\Http\Request;

class ThermalSuiteController extends Controller
{
    public function create()
    {
        return view('thermal-suites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|string|max:255',
            'thermal_name' => 'required|string|max:255',
            'thermal_type' => 'required|string|max:255',
            'sauna_temp' => 'required|numeric|between:0,999.99',
            'steamroom_temp' => 'required|numeric|between:0,999.99',
            'lounger_temp' => 'required|numeric|between:0,999.99',
            'check_interval' => 'required|integer|min:1',
            'notes' => 'nullable|string'
        ]);

        ThermalSuite::create($validated);
       // return response()->json($validated);
        return redirect()->route('thermal-suites.create')
            ->with('success', 'Thermal Suite added successfully');
    }
}