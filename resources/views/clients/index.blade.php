@extends('layouts.vertical', ['title' => 'Backwash Record for {{ $poolID }}'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Backwash Record for {{ $poolID }}'])
    <div class="container mt-5">
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<a href="{{ route('backwashes.create') }}">Log a New Backwash Record</a>
<div class="table-responsive-sm">
<table class="table table-striped mb-0 table-sm">
    <thead>
        <tr class="table-dark">
            <th>Company Name</th>
            <th>Address</th>
            <th>Contact Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Website</th>
            <th>Website</th>
            <th>Vat</th>
            <th>Company Reg. No</th>
            <th>Description</th>
            <th>Pools</th>
            <th>Users</th>
            <th>Schedules</th>
            <th>Equipment</th>
</tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{ $client->company_name }}</td>
            <td><button type="button" tabindex="0" class="btn btn-info" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="focus" data-bs-content="{{ $client->company_address }}  ?? 'None' }}" data-bs-original-title="Backwash Info">
                        Address
                    </button></td>
            <td>{{ $client->company_post_code }} </td>
            <td>{{ $client->client_contact }} </td>
            <td>{{ $client->client_phone }}</td>
            <td>{{ $client->client_email }}</td>
            <td>{{ $client->company_website }}</td>
            <td>{{ $client->vat_number }}</td>
            <td>{{ $client->company_registration_number }}</td>
            <td><div class="btn btn-soft-warning btn-icon btn-sm rounded-circle"><iconify-icon icon="solar:shield-warning-broken" class="fs-20 me-1"></iconify-icon></td>
            <td><button type="button" tabindex="0" class="btn btn-info" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="focus" data-bs-content="{{ $client->description ?? 'None' }}" data-bs-original-title="Backwash Info">
             Description</button></td>
             <td>
            <button type="button" tabindex="0" class="btn btn-info" data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="focus" data-bs-content="{{ $client->performed_by }}" data-bs-original-title="Backwash Logged By">
            <iconify-icon icon="solar:people-nearby-broken" class="fs-20 me-1" alt="{{ $client->performed_by }}"></iconify-icon>
                    </button></td>
            <td>{{ $client->created_at }}</td>
          
        </tr>
        @endforeach
    </tbody>
</table></div>
    </div>
@endsection