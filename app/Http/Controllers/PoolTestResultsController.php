<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PoolTestResultsController extends Controller {
   public function index() {
      $pooltests = DB::select('select * from pool_tests');
      return view('index',['pooltests'=>$pooltests]);
   }
}