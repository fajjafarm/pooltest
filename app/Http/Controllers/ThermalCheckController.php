<?php
namespace App\Http\Controllers;

use App\Models\ThermalSuite;
use App\Models\ThermalCheck;
use Illuminate\Http\Request;

class ThermalSuiteController extends Controller
{
    public function index()
    {
        $suites = ThermalSuite::with('thermalChecks')->get();
        return view('thermal-suites.index', compact('suites'));
    }

    public function create()
    {
        return view('thermal-suites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'check_frequency_minutes' => 'required|integer|min:1',
        ]);

        ThermalSuite::create($validated);

        return redirect()->route('thermal-suites.index')
            ->with('success', 'Thermal suite added successfully');
    }

    public function check(Request $request, ThermalSuite $thermalSuite)
    {
        $validated = $request->validate([
            'status' => 'required|in:occupied_okay,occupied_issue,not_occupied_okay,not_occupied_issue',
            'notes' => 'nullable|string',
        ]);

        ThermalCheck::create([
            'thermal_suite_id' => $thermalSuite->id,
            'user_id' => auth()->id(), // Assuming authentication is set up
            'checked_at' => now(),
            'status' => $validated['status'],
            'notes' => $validated['notes'],
        ]);

        return redirect()->route('thermal-suites.index')
            ->with('success', 'Check recorded successfully');
    }
}