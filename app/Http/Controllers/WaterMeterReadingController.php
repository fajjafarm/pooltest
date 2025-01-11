<?php

namespace App\Http\Controllers;

use App\Models\WaterMeterReading;
use App\Models\PoolList;
use Illuminate\Http\Request;

class WaterMeterReadingController extends Controller
{
    public function index($poolID)
    {
        $watermeterreadings = WaterMeterReading::where('plantroom_id', $poolID)->orderBy('created_at', 'desc')->get();
        // $poolName = PoolList::where('pool_name', $poolID)->get();
        $poolID=$poolID;
         $poolName = PoolList::where('pool_id', $poolID)->value('pool_name');
        $readings = WaterMeterReading::all();
        //$poolName = PoolList::where('pool_id', $poolID)->value('pool_name');
        return view('water-meter-readings.index', compact('readings' ,'poolID','poolName'));
    }
    public function create($poolID)
    {
        $poolID = $poolID;
        $plantroomID = $poolID;
        $poolName = PoolList::where('pool_id', $poolID)->value('pool_name');
        $WaterMeterReading = WaterMeterReading::all();
        return view('water-meter-readings.create', compact('WaterMeterReading','plantroomID', 'poolName', 'poolID'));
    }

    public function store(Request $request)
    {
        WaterMeterReading::create($request->all()+ ['logged_by' => auth()->id()]);
        return redirect()->route('water-meter-readings.index',[$request->'pool_id'])->with('success', 'Reading logged successfully.');
    }

    // Add more methods like show, edit, update, destroy if needed
}