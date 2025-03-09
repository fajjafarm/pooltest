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

    public function store(Request $request, $pool_id)
{
    $validated = $request->validate([
        'pool_id' => 'required|ulid|exists:pool_list,pool_id',
        'dpd1' => 'required|numeric|min:0',
        'dpd3' => 'required|numeric|min:0',
        'ph' => 'required|numeric|min:0|max:14',
        'sample_location' => 'required|string',
        'action_taken' => 'required|string'
    ]);

    dd($validated); // Dump validated data to confirm it passes

    $validated['ccl'] = $request->dpd3 - $request->dpd1;
    $validated['user_id'] = auth()->id() ?? throw new \Exception('User not authenticated');

    PoolTest::create($validated);

    return redirect()->route('pool-tests.index', $pool_id)
        ->with('success', 'Pool test recorded successfully');
}
}