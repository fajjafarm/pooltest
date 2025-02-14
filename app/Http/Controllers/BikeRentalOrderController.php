<?php
namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeLocks;
use App\Models\BikeHelmets;
use App\Models\BikeRental;
use App\Models\BikeRentalOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BikeRentalOrderController extends Controller
{
    public function store(Request $request)
    {
        $order = BikeRentalOrder::create([
            'order_number' => $request->order_number,
            'duration' => $request->duration,
            'date' => $request->date,
            'bike_numbers' => $request->bike_numbers,
            'helmet_numbers' => $request->helmet_numbers,
            'lock_numbers' => $request->lock_numbers,
            'status' => 'pending', // Default statuss
        ]);

        return response()->json($order, 201);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        $order = BikeRentalOrder::findOrFail($id);
        $order->update(['bike_numbers' => $request->bike_numbers]);
        $order->update(['lock_numbers' => $request->lock_numbers]);
        $order->update(['helmet_numbers' => $request->helmet_numbers]);
        $order->update(['status' => 'in progress']);

        $helmets = BikeHelmets::readyToHire();
        $locks = BikeLocks::readyToHire();
        $bikes = Bike::readyToHire();
        $orders = BikeRentalOrder::all();
       // return view('bike-rental-orders.index', compact('orders', 'bikes', 'helmets', 'locks'));
      // return view('bike-rental-orders.index');
       // return redirect()->back()->with('status', 'bike orders updated!');
        return response()->json($order);
    }
    public function index()
    {
        $helmets = BikeHelmets::readyToHire();
        $locks = BikeLocks::readyToHire();
        $bikes = Bike::readyToHire();
        $orders = BikeRentalOrder::all();
        return view('bike-rental-orders.index', compact('orders', 'bikes', 'helmets', 'locks'));
    }
}
