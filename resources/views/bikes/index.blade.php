@extends('layouts.vertical', ['title' => 'Bike Rental Log'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Bike Rental Log'])
    <div class="container mt-5">
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">
<h1>Bike Rental Log</h1>

@foreach($bikes as $bike)
    <div>
        <h3>{{ $bike->type }} - Status: {{ $bike->status }}</h3>
        <p>Rentals:
        @foreach($bike->rentals as $rental)
            <br>- Order: {{ $rental->order_number }}, Name: {{ $rental->name }}, Duration: {{ $rental->duration }}, Helmet: {{ $rental->helmet_borrowed ? 'Yes' : 'No' }}, Lock: {{ $rental->lock_borrowed ? 'Yes' : 'No' }}
        @endforeach
        </p>
        <form method="POST" action="{{ route('bikes.update', $bike->id) }}">
            @csrf
            @method('PUT')
            <select name="status">
                <option value="ready for hire">Ready for Hire</option>
                <option value="hired">Hired</option>
                <option value="awaiting check">Awaiting Check</option>
                <option value="awaiting maintenance">Awaiting Maintenance</option>
                <option value="reserved">Reserved</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    </div>
@endforeach

<form action="{{ route('bikes.store') }}" method="POST">
    @csrf
    <input type="text" name="bike_id" placeholder="Bike ID">
    <input type="text" name="order_number" placeholder="Order Number">
    <input type="text" name="name" placeholder="Name">
    <input type="number" name="duration" placeholder="Duration">
    <input type="checkbox" name="helmet_borrowed" value="1"> Helmet
    <input type="checkbox" name="lock_borrowed" value="1"> Lock
    <button type="submit">Rent Bike</button>
</form>
    </div>
@endsection