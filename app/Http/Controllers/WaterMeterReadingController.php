<?php

namespace App\Http\Controllers;

use App\Models\WaterMeterReading;
use Illuminate\Http\Request;

class WaterMeterReadingController extends Controller
{
    public function index()
    {
        $readings = WaterMeterReading::all();
        return view('water-meter-readings.index', compact('readings'));
    }

    public function store(Request $request)
    {
        WaterMeterReading::create($request->all()+ ['logged_by' => auth()->id()]);
        return redirect()->route('readings.index')->with('success', 'Reading logged successfully.');
    }

    // Add more methods like show, edit, update, destroy if needed
}