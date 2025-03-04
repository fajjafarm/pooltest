<?php
namespace App\Http\Controllers;

use App\Models\PoolTest;
use App\Models\PoolList;
use Illuminate\Http\Request;

class PoolTestController extends Controller
{
    public function index()
    {
        $tests = PoolTest::with(['pool', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        $pools = PoolList::all();
        
        return view('pool-tests.index', compact('tests', 'pools'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pool_id' => 'required|exists:pools,id',
            'dpd1' => 'required|numeric|min:0',
            'dpd3' => 'required|numeric|min:0',
            'ph' => 'required|numeric|min:0|max:14',
            'sample_location' => 'required|in:pool,control_panel',
            'action_taken' => 'required|in:none,Changed Chlorine,Changed Acid,Changed PAC,Recalibrated Controller,Backwashed,Supervisor Notified,Code Brown,Code Yellow,Shocked'
        ]);

        $validated['user_id'] = auth()->id();

        PoolTest::create($validated);

        return redirect()->back()->with('success', 'Pool test recorded successfully');

    //   if ( $ccl > 1){
        
      //  return redirect()->route('pooltest.create')->with('notgood', 'Combined Chlorine High! Action created');
     //   }
      //  if ($ccl <=1 ){
       //     return redirect()->route('pooltest.create')->with('success', 'Pool test data submitted successfully!');
        //    }
        
    }
}