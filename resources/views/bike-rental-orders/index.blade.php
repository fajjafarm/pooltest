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
            <th colspan="8">Bike Hire Orders</th>
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

<td>                            <p class="mb-1 fw-bold text-muted">Multiple Select</p>
                            <p class="text-muted fs-14">
                                Select2 can take a regular select box like this...
                            </p>

                            <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple"
                                data-placeholder="Choose ...">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
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