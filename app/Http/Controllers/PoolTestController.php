<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoolTest;

class PoolTestController extends Controller
{
    public function pooltests()
    {
       // $testresults ='empty';
    $pooltests = DB::select('select * from pool_tests');
      return view('pooltests', compact('pooltests'));
    }
    public function create()
    {
        return view('pooltest.submit');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            `pool_id` => 'required|numeric',
            `user_id` => 'required|numeric',
            'dpd1' => 'required|numeric',
            'dpd3' => 'required|numeric',
            'ph' => 'required|numeric',
            'comments' => 'nullable|string',
        ]);

        $validatedData['ccl'] = $validatedData['dpd3'] - $validatedData['dpd1'];

        PoolTest::create($validatedData);

        return redirect('/pooltest/submit')->with('success', 'Pool test result submitted successfully!');
    }
}