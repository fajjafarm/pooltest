@extends('layouts.vertical', ['title' => 'Bike Lock Log'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Bike Lock Log'])
    
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">



        <div class="col-md-6">
            <div class="card border-secondary border">
            <div class="container">
            <h1>{{ $employee->first_name }} {{ $employee->surname }}</h1>
        
        <div class="card mb-4">
            <div class="card-body">
                <p>Position: {{ $employee->position }}</p>
                <p>Start Date: {{ $employee->start_date }}</p>
                @if($employee->end_date)
                    <p>End Date: {{ $employee->end_date }}</p>
                @endif
            </div>
        </div>

        <h2>Qualifications</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Acquired</th>
                    <th>Expires</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee->qualifications as $qualification)
                    <tr>
                        <td>{{ $qualification->name }}</td>
                        <td>{{ $qualification->acquired_date }}</td>
                        <td>{{ $qualification->expiry_date ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Training Hours by Year</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trainingByYear as $year)
                    <tr>
                        <td>{{ $year->year }}</td>
                        <td>{{ number_format($year->total_hours, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   
@endsection