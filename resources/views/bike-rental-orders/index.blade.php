@extends('layouts.vertical', ['title' => 'Bike Helmets Log'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Bike Helmets Log'])
    
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">



        <div class="col-md-6">
            <div class="card border-secondary border">
                <div class="card-body">
                <div class="table-responsive-sm">
<table class="table table-striped mb-0 table-sm">
    <thead>
        <tr class="table-dark">
            <th colspan="7">Bike Hire Orders</th>
            </tr>
<tr class="table-dark">
            <th>ORder #</th>
            <th>Duration</th>
            <th>Date</th>
            <th>Bikes</th>
            <th>Helmets</th>
            <th>Locks</th>
            <th>Status</th>
            
</tr>
<tbody>
@foreach ($orders as $order)
        <tr>
        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->duration }} hours</td>
                        <td>{{ $order->date->format('Y-m-d') }}</td>
                        <td>{{ implode(', ', $order->bike_numbers) }}</td>
                        <td>{{ implode(', ', $order->helmet_numbers) }}</td>
                        <td>{{ implode(', ', $order->lock_numbers) }}</td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'pending') bg-warning 
                                @elseif($order->status == 'in progress') bg-primary 
                                @elseif($order->status == 'returned') bg-success 
                                @endif"
                            >
                                {{ $order->status }}
                            </span>
                        </td>
</tr>
            @endforeach
            </table></div><!-- end table-->
            </div><!-- end card-body-->
                </div> <!-- end card-bordery-->
            </div> <!-- end column-->
            </div><!-- end card-body-->
            
    </div>
    <!-- end row -->
   
@endsection