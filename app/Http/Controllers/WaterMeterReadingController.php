<?php

namespace App\Http\Controllers;

use App\Models\WaterMeterReading;
use App\Models\PoolList;
use Illuminate\Http\Request;

class WaterMeterReadingController extends Controller
{
    public function index($poolID , $chart)
    {
        $watermeterreadings = WaterMeterReading::where('plantroom_id', $poolID)->orderBy('created_at', 'desc')->get();
        // $poolName = PoolList::where('pool_name', $poolID)->get();
        $poolID=$poolID;
         $poolName = PoolList::where('pool_id', $poolID)->value('pool_name');
        $readings = WaterMeterReading::all();
        //$poolName = PoolList::where('pool_id', $poolID)->value('pool_name');

        $labels = [];
        $values = [];

        foreach ($watermeterreadings as $watermeterreading){
            $labels[]=$watermeterreading['created_at'];
            $values[]=$watermeterreading['meter_reading'];

        }
        $chart = $chart->barChart()
        ->setTitle('Water Meter Reading')
        ->addData('Litres', $values->values()->toArray())
        ->setXAxis($labels->keys()->toArray());

        return view('water-meter-readings.index', compact('readings' ,'poolID','poolName','labels','values', 'chart'));
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