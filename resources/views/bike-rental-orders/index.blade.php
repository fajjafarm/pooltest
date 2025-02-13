@extends('layouts.vertical', ['title' => 'Bike Orders'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Bike Orders'])
    
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">



        <div class="col-md-12">
            <div class="card border-secondary border">
                <div class="card-body">
                <div class="table-responsive-sm">
<table class="table table-striped mb-0 table-sm">
    <thead>
        <tr class="table-dark">
            <th colspan="9">Bike Hire Orders</th>
            </tr>
<tr class="table-dark">
            <th>Order #</th>
            <th>Duration</th>
            <th>Date</th>
            <th>Bikes</th>
            <th>Helmets</th>
            <th>Locks</th>
            <th>Status</th>
            <th>&nbsp;</th>
            
</tr>
<tbody>
@foreach ($orders as $order)
<tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->duration }} hours</td>
                        <td>{{ $order->date->format('d-m-Y') }}</td>
                        <td>
                            <select class="form-select" name="bike_numbers[{{ $order->id }}][]" multiple>
                                @foreach($bikes as $bike)
                                    <option value="{{ $bike }}" {{ in_array($bike, $order->bike_numbers) ? 'selected' : '' }}>{{ $bike }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td> <label for="choices-multiple-remove-button" class="form-label text-muted">With remove
                        button</label>
                        <select class="form-control" id="choices-multiple-remove-button" data-choices
                                        data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                        @foreach($helmets as $helmet)
                                    <option value="{{ $helmet }}" {{ in_array($helmet, $order->helmet_numbers) ? 'selected' : '' }}>{{ $helmet }}</option>
                                @endforeach
                            </select>

</td>
<td>

                        <select class="form-select" name="helmet_numbers[{{ $order->id }}][]" multiple>
                                @foreach($helmets as $helmet)
                                    <option value="{{ $helmet }}" {{ in_array($helmet, $order->helmet_numbers) ? 'selected' : '' }}>{{ $helmet }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="lock_numbers[{{ $order->id }}][]" multiple>
                                @foreach($locks as $lock)
                                    <option value="{{ $lock }}" {{ in_array($lock, $order->lock_numbers) ? 'selected' : '' }}>{{ $lock }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-select" name="status[{{ $order->id }}]">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in progress" {{ $order->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Returned</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="updateOrder('{{ $order->id }}')">Update</button>
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