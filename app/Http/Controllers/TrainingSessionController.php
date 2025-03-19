<?php
namespace App\Http\Controllers;

class TrainingSessionController extends Controller
{
    public function create()
    {
        $employees = Employee::all();
        return view('training.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:Pool Rescue,First Aid,Departmental,Other',
            'custom_type' => 'required_if:type,Other',
            'date' => 'required|date',
            'duration' => 'required|numeric|min:0',
            'description' => 'nullable',
            'employees' => 'required|array',
            'comments' => 'array'
        ]);

        $training = TrainingSession::create($validated);
        
        $syncData = [];
        foreach ($request->employees as $employeeId) {
            $syncData[$employeeId] = ['comments' => $request->comments[$employeeId] ?? ''];
        }
        $training->employees()->sync($syncData);

        return redirect()->route('training.create')->with('success', 'Training session recorded');
    }
}