@extends('layouts.vertical', ['title' => 'View all Backwashwa'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'View All Backwashes'])
    <div class="container mt-5">
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<a href="{{ route('backwashes.create') }}">Log a New Backwash Record</a>
<div class="table-responsive-sm">
<table class="table table-striped mb-0 table-sm">
    <thead>
        <tr class="table-dark">
            <th>&nbsp;</th>
            <th colspan="3">Filter Backwashed?</th>
            <th colspan="6">Filter Pressures (bar)</th>
            <th colspan="3">Pump Status</th>
            <th colspan="3">Baskets Cleaned?</th>
            <th colspan="4">&nbsp;</th>
</tr>
<tr class="table-dark">
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
            <th>B1</th>
            <th>B2</th>
            <th>B3</th>
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
            <td>
            @if($backwash->filter1_backwashed == 1)<iconify-icon icon="solar:check-read-line-duotone" class="fs-20 me-1"></iconify-icon>@endif
            @if($backwash->filter1_backwashed == 0)<iconify-icon icon="solar:shield-warning-line-duotone" class="fs-20 me-1"></iconify-icon><@endif    
            </td>
            <td>
            @if($backwash->filter2_backwashed == 1)<iconify-icon icon="solar:check-read-line-duotone" class="fs-20 me-1"></iconify-icon>@endif
            @if($backwash->filter2_backwashed == 0)<iconify-icon icon="solar:shield-warning-line-duotone" class="fs-20 me-1"></iconify-icon><@endif    
            </td>
            <td>
            @if($backwash->filter3_backwashed == 1)<iconify-icon icon="solar:check-read-line-duotone" class="fs-20 me-1"></iconify-icon>@endif
            @if($backwash->filter3_backwashed == 0)<iconify-icon icon="solar:shield-warning-line-duotone" class="fs-20 me-1"></iconify-icon><@endif    
            </td>
            <td>{{ $backwash->filter1_before_pressure }}</td>
            <td>{{ $backwash->filter1_after_pressure }}</td>
            <td>{{ $backwash->filter2_before_pressure }}</td>
            <td>{{ $backwash->filter2_after_pressure }}</td>
            <td>{{ $backwash->filter3_before_pressure }}</td>
            <td>{{ $backwash->filter3_after_pressure }}</td>
            <td>{{ $backwash->pump1_status }}</td>
            <td>{{ $backwash->pump2_status }}</td>
            <td>{{ $backwash->pump3_status }}</td>
            <td>{{ $backwash->basket1_cleaned ? 'Yes' : 'No' }}</td>
            <td>{{ $backwash->basket2_cleaned ? 'Yes' : 'No' }}</td>
            <td>{{ $backwash->basket3_cleaned ? 'Yes' : 'No' }}</td>
            <td>{{ $backwash->reason_for_backwash }}</td>
            <td>{{ $backwash->issues ?? 'None' }}</td>
            <td>{{ $backwash->performed_by }}</td>
            <td>{{ $backwash->created_at }}</td>
          
        </tr>
        @endforeach
    </tbody>
</table></div>
    </div>
@endsection