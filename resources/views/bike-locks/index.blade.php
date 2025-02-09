@extends('layouts.vertical', ['title' => 'Bike Lock Log'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Bike Lock Log'])
    
   
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
            <th colspan="3">Bike Locks</th>
            </tr>
<tr class="table-dark">
            <th>#</th>
            <th>Size</th>
            <th>Status</th>
            
</tr>
<tbody>
        @foreach($locks as $lock)
        <tr>
        <td>{{$lock->id}}</td>
            <td>{{$lock->code}}</td>
            
            <td>        <form method="POST" action="{{ route('bike-locks.update', $lock->id) }}">
            @csrf
            @method('PUT')
            <div class="input-group">
            <select class="form-select" name="status" aria-label="Example select with button addon">
                <option value="ready for hire" @if($lock->status == 'ready for hire') selected @endif>Ready for Hire</option>
                <option value="hired" @if($lock->status == 'hired') selected @endif>Hired</option>
                <option value="awaiting check" @if($lock->status == 'awaiting check') selected @endif>Awaiting Check</option>
                <option value="awaiting maintenance" @if($lock->status == 'awaiting maintenance') selected @endif>Maintenance</option>
                <option value="reserved" @if($lock->status == 'Reserved') selected @endif>Reserved</option>
                <option value="missing" @if($lock->status == 'Missing') selected @endif>Missing</option>
            </select>
            <button class="btn btn-outline-secondary" type="submit">Update</button></div>
</form>
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