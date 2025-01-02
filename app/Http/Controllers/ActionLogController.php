<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActionLog;

class ActionLogController extends Controller
{
    /**
     * Display a form to log an action for an out-of-range test.
     *
     * @param  int  $testId
     * @return \Illuminate\View\View
     */
    public function create($testId)
    {
        $actionTypes = [
            'Pool Test', 'Equipment Check', 'PPE', 'Maintenance', 'Cleaning', 
            'Temperature', 'Water Balance', 'Training', 'Servicing', 'Eye Wash', 'First Aid Stock', 'First Aid Grab Bag'
        ];
        $escalationTypes = [
            'Pool Test', 'Equipment Check', 'PPE', 'Maintenance', 'Cleaning', 
            'Temperature', 'Water Balance', 'Training', 'Servicing', 'Supervisor/Manager'
        ];
        $progressTypes = [
            'Not Started', 'In Progress', 'Unable to Complete', 'Complete'
        ];
        return view('actionlog.create', compact('testId', 'actionTypes','escalationTypes','progressTypes'));
    }

    /**
     * Store the newly created action log in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    
    {
        $request->validate([
            'action_type' => 'required|string',
            'escalation' => 'nullable|string',
            'progress' => 'nullable|string',
            'comments' => 'nullable|string',
            'actioned_by' => 'required|string',
        ]);

        ActionLog::create($request->all()+ ['user_id' => auth()->id()]);

        return redirect()->route('actionlog.create', ['testId' => $request->test_id])->with('success', 'Action logged successfully!');
    }
}