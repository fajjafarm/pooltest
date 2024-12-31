<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoolTest; // Ensure you have this model defined

class PoolTestController extends Controller
{
    /**
     * Show the form for creating a new pool test entry.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pooltest.create');
    }

    /**
     * Store a newly created pool test in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dpd1' => 'required|numeric',
            'dpd3' => 'required|numeric',
            'ph' => 'required|numeric',
            'comments' => 'required',
        ]);

        $pooltest = new PoolTest([
        'dpd1' => $request->input('dpd1'),
        'dpd3' => $request->input('dpd3'),
        'ccl' => $request->input('dpd3')-$request->input('dpd1'),
        'ph' => $request->input('ph'),
        'comments' => $request->input('comments'),
        ]);
        $pooltest->save();
       // PoolTest::create($validatedData);
       if ($request->input('dpd3')-$request->input('dpd1') > 1){
        return redirect()->route('pooltest.create')->with('error', 'Combined Chlorine High!');
        }
        if ($request->input('dpd3')-$request->input('dpd1') <=1 ){
            return redirect()->route('pooltest.create')->with('success', 'Pool test data submitted successfully!');
            }
        
    }
}