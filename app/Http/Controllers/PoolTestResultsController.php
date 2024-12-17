<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class PoolTestResultsController extends Controller
{
  $pooltestresults ='0';

    /**
     * Show a list of all of the application's pol test results.
     */
    public function pooltestresults()
    {
       // $testresults ='empty';
    $this->$pooltestresults = DB::select('select * from tests');
      return view('pooltests',compact('pooltestresults'));
        
    }
}
