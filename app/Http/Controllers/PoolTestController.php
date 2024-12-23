<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PoolTest;

class PoolTestController extends Controller
{
    public function create()
    {
        return view('pooltest.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            `pool_id` => '1';
            `user_id` => '1';
            'dpd1' => 'required|numeric',
            'dpd3' => 'required|numeric',
            'ph' => 'required|numeric',
            'comments' => 'nullable|string',
        ]);

        $validatedData['ccl'] = $validatedData['dpd3'] - $validatedData['dpd1'];

        PoolTest::create($validatedData);

        return redirect('/')->with('success', 'Pool test result submitted successfully!');
    }
}