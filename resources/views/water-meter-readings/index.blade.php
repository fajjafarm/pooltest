@extends('layouts.vertical', ['title' => 'Backwash Record for'.$poolName])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Backwash Records'])
    <div class="container mt-5">
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Water Meter Readings </h4>
                    <div>
                        <a href="{{ route('readings.create', ['poolID' => $poolID ])}}" class="btn btn-success bg-gradient"><i
                                class="ti ti-plus me-1"></i> Add a Water Meter Reading</a>
                        
                    </div>
                </div>
<div class="table-responsive-sm">
<h1>Water Meter Readings</h1>
    <ul>
        @foreach ($readings as $reading)
            <li>{{ $reading->reading_id }} - Reading: {{ $reading->meter_reading }} at Plantroom: {{ $reading->plantroom_id }} by User: {{ $reading->logged_by }}</li>
        @endforeach
    </ul></div>
    </div>
@endsection