<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
 
class PoolTestResultsController extends Controller
{
    public function index(Request $request): View
    {
        $title = "Arran Ferry Forecast";
        $description = "A rough guide to possible weather realted ferry disruption";
        $assets = ['chart', 'animation'];
        return view('pooltests', compact('title','description','assets'));}
}
