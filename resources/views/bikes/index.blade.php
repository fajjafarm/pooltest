@extends('layouts.vertical', ['title' => 'Bike Rental Log'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Bike Rental Log'])
    
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">



<div class="row">
        <div class="col-md-6">
            <div class="card border-secondary border">
                <div class="card-body">
                <div class="table-responsive-sm">
<table class="table table-striped mb-0 table-sm">
    <thead>
        <tr class="table-dark">
            <th colspan="4">Mountain Bikes</th>
            </tr>
<tr class="table-dark">
            <th>#</th>
            <th>Size</th>
            <th>Status</th>
            <th>Update</th>
</tr>
<tbody>
        @foreach($mountainbikes as $mountainbike)
        <tr>
        <td>{{$mountainbike->id}}</td>
            <td>{{$mountainbike->size}}</td>
            <td>{{$mountainbike->status}}</td>
            <td>        <form method="POST" action="{{ route('bikes.update', $mountainbike->id) }}">
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
        </form></td>

            </tr>
            @endforeach
            </table></div>
            </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        
        <div class="col-md-6">
            <div class="card border-primary border border-dashed">
                <div class="card-body">
                @foreach($hybrids as $hybrid)
        <tr>
        <td>{{$hybrid->id}}</td>
            <td>{{$hybrid->size}}</td>
            <td>{{$hybrid->status}}</td>
            <td>        <form method="POST" action="{{ route('bikes.update', $hybrid->id) }}">
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
        </form></td>

            </tr>
            @endforeach
            </table></div>
            </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6">
            <div class="card border-success border">
                <div class="card-body">
                @foreach($ebikes as $ebike)
        <tr>
        <td>{{$ebike->id}}</td>
            <td>{{$ebike->size}}</td>
            <td>{{$ebike->status}}</td>
            <td>        <form method="POST" action="{{ route('bikes.update', $ebike->id) }}">
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
        </form></td>

            </tr>
            @endforeach
            </table></div>
            </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
    </div>
@endsection