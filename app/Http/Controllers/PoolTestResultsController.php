<?php

namespace App\Http\Controllers;

use {{ namespacedModel }};
use App\Models\lain;
use Illuminate\Http\Request;

class PoolTestResults extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(lain $lain)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(lain $lain)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, lain $lain)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(lain $lain, {{ model }} ${{ modelVariable }})
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lain $lain, {{ model }} ${{ modelVariable }})
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lain $lain, {{ model }} ${{ modelVariable }})
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lain $lain, {{ model }} ${{ modelVariable }})
    {
        //
    }
}
