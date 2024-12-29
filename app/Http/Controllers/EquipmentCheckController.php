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
            'Goggles', 'Gloves', 'Apron', 'Drench Shower', 'Eye Wash', 'First Aid Stock', 'First Aid Grab Bag'
        ];
        
        
        $equipmentLocations = [
            'Spa Pool', 'Hotel Pool', 'Hot Tub', 'Spa Pool Plantroom', 'Hotel Pool Plantroom', 
            'Hot Tub Plantroom'
        ];
        
        return view('equipment-check', compact('equipmentLocations', 'equipmentTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'equipment_type' => 'required',
            'equipment_location' => 'required',
            'check_date' => 'required|date',
            'condition' => 'required',
            'comments' => 'nullable|string',
        ]);

        EmergencyEquipmentCheck::create($validatedData);
        
        return redirect()->back()->with('success', 'Equipment check recorded successfully!');
    }
}