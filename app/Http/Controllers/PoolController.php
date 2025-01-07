<?php
namespace App\Http\Controllers;

use App\Models\PoolList;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function create()
    {
        return view('pools.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|integer',
            'pool_name' => 'required|string|max:255',
            'pool_type' => 'required|string|max:255',
            'length' => 'required|numeric',
            'width' => 'required|numeric',
            'depth' => 'required|numeric',
            'volume' => 'required|numeric',
            'ideal_dpd1' => 'required|numeric',
            'ideal_ph' => 'required|numeric',
            'ideal_alk' => 'required|numeric',
            'ideal_calc' => 'required|numeric',
            'ideal_water_temp' => 'required|numeric',
            'ideal_air_temp' => 'required|numeric',
        ]);

        $pool = new PoolList;
        $pool->id = Str::ulid(); // Generate ULID
        $pool->fill($validatedData);
        $pool->save();

        return redirect()->route('pools.index')->with('success', 'Pool added successfully.');
    }
}