<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class PoolTestResultsController extends Controller
{
    /**
     * Show a list of all of the application's pol test results.
     */
    public function pooltestresults()
    {
       $pooltestresults =DB::select('select * from pool_tests');
      return view('pooltests',['pooltestresults' => $pooltestresults]);
 
        
    }
}