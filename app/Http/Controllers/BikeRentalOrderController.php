<?php
namespace App\Http\Controllers;

use App\Models\Bike;
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

    public function updateStatus(Request $request, $id)
    {
        $order = BikeRentalOrder::findOrFail($id);
        $order->update(['status' => $request->status]);

        return response()->json($order);
    }
    public function index()
    {
        $orders = BikeRentalOrder::all();
        return view('bike-rental-orders.index', compact('orders'));
    }
}
