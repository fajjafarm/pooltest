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
      return $pooltestresults = pool_tests::all();
 
        
    }
}