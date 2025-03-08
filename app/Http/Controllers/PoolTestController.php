<?php
namespace App\Http\Controllers;

use App\Models\PoolTest;
use App\Models\PoolList;
use Illuminate\Http\Request;

class PoolTestController extends Controller
{
    public function index($pool_id = null)
    {
        // Build the query
        $query = PoolTest::with(['pool', 'user'])
            ->orderBy('created_at', 'desc');
        
        // If pool_id is provided, filter by it
        if ($pool_id) {
            $query->where('pool_id', $pool_id);
        }
        
        // Get paginated results
        $tests = $query->paginate(10);
        
        $pools = PoolList::all();
        
        return view('pool-tests.create', compact('tests', 'pools', 'pool_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pool_id' => 'required|exists:pool_list,pool_id',
            'dpd1' => 'required|numeric|min:0',
            'dpd3' => 'required|numeric|min:0',
            'ph' => 'required|numeric|min:0|max:14',
            'sample_location' => 'required|in:pool,control_panel',
            'action_taken' => 'required|in:none,Changed Chlorine,Changed Acid,Changed PAC,Recalibrated Controller,Backwashed,Supervisor Notified,Code Brown,Code Yellow,Shocked'
        ]);
        $validated['ccl'] = $request->dpd3 - $request->dpd1;
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