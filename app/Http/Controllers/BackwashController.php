<?php

namespace App\Http\Controllers;

use App\Models\Backwash;
use Illuminate\Http\Request;

class BackwashController extends Controller
{
    public function create()
    {
        $backwashTypes = [
            'Scheduled','Corrective Action', 'Code Brown', 'Service'
        ];
        $backwashTypes = [
            'Scheduled','Corrective Action', 'Code Brown', 'Service'
        ];
        $backwashes = Backwash::all();
        return view('backwashes.create', compact('backwashes', 'backwashTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pool_id' => 'required|exists:pools,id',
            'pump1_before_pressure' => 'nullable|numeric',
            'pump1_after_pressure' => 'nullable|numeric',
            'basket1_cleaned' => 'boolean',
            'pump2_before_pressure' => 'nullable|numeric',
            'pump2_after_pressure' => 'nullable|numeric',
            'basket2_cleaned' => 'boolean',
            'pump3_before_pressure' => 'nullable|numeric',
            'pump3_after_pressure' => 'nullable|numeric',
            'basket3_cleaned' => 'boolean',
            'reason_for_backwash' => 'required|string',
            'issues' => 'nullable|string',
            'performed_by' => 'required|string'
        ]);

        Backwash::create($validatedData);

        return redirect()->route('backwashes.create')->with('success', 'Backwash record created successfully.');
    }
}