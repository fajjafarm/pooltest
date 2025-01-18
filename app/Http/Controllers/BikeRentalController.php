<?php
namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Rental;
use Illuminate\Http\Request;

class BikeRentalController extends Controller
{
    public function index()
    {
        $bikes = Bike::with('bike_rentals')->get();
        return view('bikes.index', compact('bikes'));
    }

    public function store(Request $request)
    {
        // Logic to create a new rental
        $bike = Bike::find($request->bike_id);
        $bike->status = 'hired';
        $bike->save();

        BikeRental::create([
            'bike_id' => $request->bike_id,
            'order_number' => $request->order_number,
            'name' => $request->name,
            'duration' => $request->duration,
            'helmet_borrowed' => $request->helmet_borrowed ?? false,
            'lock_borrowed' => $request->lock_borrowed ?? false,
        ]);

        return redirect()->route('bikes.index')->with('status', 'Bike rented successfully!');
    }

    public function updateBikeStatus(Request $request, $id)
    {
        $bike = Bike::find($id);
        $bike->status = $request->status;
        $bike->save();
        return redirect()->back()->with('status', 'Bike status updated!');
    }
}