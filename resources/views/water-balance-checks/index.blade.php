@extends('layouts.vertical', ['title' => 'Water Balance Record for'.$poolName])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Water Balance Record'])
    <div class="container mt-5">
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Water Balance Record for {{$poolName}} </h4>
                    <div>
                        <a href="{{ route('backwashes.create', ['poolID' => $poolID ])}}" class="btn btn-success bg-gradient"><i
                                class="ti ti-plus me-1"></i> Record a Water Balance Test</a>
                        
                    </div>
                </div>
<div class="table-responsive-sm">
<table class="table table-striped mb-0 table-sm">
    <thead>
        <tr class="table-dark">
            <th colspan="3">Alkalinity</th>
            <th colspan="6">Calcium Hardness</th>
            <th colspan="3">ph</th>
            <th colspan="3">Water Balance</th>
            <th colspan="4">Logged By</th>
            <th colspan="4">Logged At</th>
</tr>
    </thead>
    <tbody>
        @foreach($balances as $balance)
        <tr>
            <td>{{ $balance->alkalinity }}</td>
            <td>{{ $balance->calcium_hardness }}</td>
            <td>{{ $balance->ph }}</td>
            <td>{{ $balance->water_balance }}</td>
            <td>
            <button type="button" tabindex="0" class="btn btn-info" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="focus" data-bs-content="{{ $balance->performed_by }}" data-bs-original-title="Water Balance Logged By">
            <iconify-icon icon="solar:people-nearby-broken" class="fs-20 me-1" alt="{{ $balance->performed_by }}"></iconify-icon>
                    </button></td>
            <td>{{ $balance->created_at }}</td>
          
        </tr>
        @endforeach
    </tbody>
</table></div>
    </div>
@endsection