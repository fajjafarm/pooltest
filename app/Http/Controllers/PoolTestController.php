<?php 
namespace App\Http\Controllers;

use App\Models\PoolTest;
use App\Models\PoolList;
use Illuminate\Http\Request;

class PoolTestController extends Controller
{
    public function index($pool_id)
    {
        $tests = PoolTest::with(['pool', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        $pools = PoolList::findOrFail($pool_id);
        
        return view('pool-tests.create', compact('tests', 'pools', 'pool_id'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'pool_id' => 'required|exists:pool_lists,pool_id',
                'dpd1' => 'required|numeric|min:0',
                'dpd3' => 'required|numeric|min:0',
                'ph' => 'required|numeric|min:0|max:14',
                'sample_location' => 'required|in:Pool,Control Panel',
                'action_taken' => 'required|in:none,Changed Chlorine,Changed Acid,Changed PAC,Recalibrated Controller,Backwashed,Supervisor Notified,Code Brown,Code Yellow,Shocked'
            ]);

            $validated['ccl'] = $request->dpd3 - $request->dpd1;
            $validated['user_id'] = auth()->id() ?? throw new \Exception('User not authenticated');
            dd($validated);


            PoolTest::create($validated);

            return redirect()->back()->with('success', 'Pool test recorded successfully');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to record pool test: ' . $e->getMessage());
        }
    }
}