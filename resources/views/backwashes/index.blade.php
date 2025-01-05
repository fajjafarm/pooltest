@extends('layouts.vertical', ['title' => 'View all Backwashwa'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'View All Backwashes'])
    <div class="container mt-5">
    <h1>Backwash Records</h1>

@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<a href="{{ route('backwashes.create') }}">Log a New Backwash Record</a>

<table>
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th colspan="3">Filter Backwashed?</th>
            <th colspan="6">Filter Pressures (bar)</th>
            <th colspan="3">Pump Status</th>
            <th colspan="4">&nbsp;</th>
</tr>
<tr>
            <th>Pool ID</th>
            <th>F1</th>
            <th>F2</th>
            <th>F3</th>
            <th>F1 before</th>
            <th>F1 After</th>
            <th>F2 Before</th>
            <th>F2 After</th>
            <th>F3 Before</th>
            <th>F3 After</th>
            <th>Pump 1</th>
            <th>Pump 2</th>
            <th>Pump 3</th>
            <th>Reason</th>
            <th>Issues</th>
            <th>Performed By</th>
            <th>Created At</th>
                   </tr>
    </thead>
    <tbody>
        @foreach($backwashes as $backwash)
        <tr>
            <td>{{ $backwash->pool_id }}</td>
            <td>{{ $backwash->filter1_backwashed }}</td>
            <td>{{ $backwash->filter2_backwashed }}</td>
            <td>{{ $backwash->filter3_backwashed }}</td>
            <td>{{ $backwash->filter1_before_pressure }}</td>
            <td>{{ $backwash->filter1_after_pressure }}</td>
            <td>{{ $backwash->filter2_before_pressure }}</td>
            <td>{{ $backwash->filter2_after_pressure }}</td>
            <td>{{ $backwash->filter3_before_pressure }}</td>
            <td>{{ $backwash->filter3_after_pressure }}</td>
            <td>{{ $backwash->pump1_status }}</td>
            <td>{{ $backwash->pump2_status }}</td>
            <td>{{ $backwash->pump3_status }}</td>
            <td>{{ $backwash->basket_cleaned ? 'Yes' : 'No' }}</td>
            <td>{{ $backwash->reason_for_backwash }}</td>
            <td>{{ $backwash->issues ?? 'None' }}</td>
            <td>{{ $backwash->performed_by }}</td>
            <td>{{ $backwash->created_at }}</td>
          
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
@endsection