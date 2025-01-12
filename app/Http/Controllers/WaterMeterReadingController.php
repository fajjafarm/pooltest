<?php

namespace App\Http\Controllers;

use App\Models\WaterMeterReading;
use App\Models\PoolList;
use App\Charts\WaterBalanceChart;
use Illuminate\Http\Request;
use marineusde\LarapexCharts\Facades\LarapexChart;



class WaterMeterReadingController extends Controller
{
    public function index($poolID)
    {
        $readings = WaterMeterReading::where('plantroom_id', $poolID)->orderBy('created_at', 'desc')->get();
        // $poolName = PoolList::where('pool_name', $poolID)->get();
        $poolName = PoolList::where('pool_id', $poolID)->value('pool_name');
         $chart = new WaterBalanceChart();
        
           return view('water-meter-readings.index', compact('readings' ,'poolID','poolName','chart'));
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
        return redirect()->route('water-meter-readings.index',[$request->input('pool_id')])->with('success', 'Reading logged successfully.');
    }

    // Add more methods like show, edit, update, destroy if needed
}