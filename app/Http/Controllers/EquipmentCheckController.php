<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyEquipmentCheck;

class EquipmentCheckController extends Controller
{
    public function index()
    {
        $equipmentTypes = [
            'Torpedo Buoy', 'Rope', 'Reach Poles', 'Defib', 'Mask', 
            'Goggles', 'Gloves', 'Apron', 'Drench Shower', 'Eye Wash'
        ];
        return view('equipment-check', compact('equipmentTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'equipment_type' => 'required',
            'check_date' => 'required|date',
            'status' => 'required|boolean',
            'comments' => 'nullable|string',
        ]);

        EmergencyEquipmentCheck::create($validatedData);

        return redirect('/equipment-check')->with('success', 'Equipment check recorded successfully!');
    }
}