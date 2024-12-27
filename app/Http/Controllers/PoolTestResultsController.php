<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class PoolTestsController extends Controller
{
  
    /**
     * Show a list of all of the application's pol test results.
     */
    public function pooltests()
    {
       // $testresults ='empty';
    $pooltests = DB::select('select * from pool_tests');
      return view('pooltests', compact('pooltests'));
    }
}