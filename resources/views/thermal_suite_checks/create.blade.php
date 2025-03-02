@extends('layouts.vertical', ['title' => 'Thermal Suite Checks'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Thermal Suite Checks'])

    <body>

@if(session('success'))  
        <div class="alert alert-success">{{ session('success') }} </div>
    @endif
    @if(session('error'))  
    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <iconify-icon icon="solar:danger-triangle-bold-duotone" class="fs-20 me-1"></iconify-icon>
                        <div class="lh-1"><strong>Error - </strong> {{ session('error') }}</div>
                    </div>
    @endif

<div class="alert alert-info">
    Last check: {{ $timeSinceLastCheck }}
</div>
<h3>Add a check for: {{ $thermalSuite->thermal_name }}</h3>
<form method="POST" action="{{ route('thermal_suite_checks.store', $thermalSuite->id) }}">
    @csrf

    <div class="mb-3">
        <button type="submit" name="status" value="occupied_okay" 
                class="btn btn-success mr-2">Occupied - Okay</button>
        <button type="submit" name="status" value="occupied_issue" 
                class="btn btn-warning mr-2">Occupied - Issue</button>
        <button type="submit" name="status" value="empty_okay" 
                class="btn btn-primary mr-2">Empty - Okay</button>
        <button type="submit" name="status" value="empty_issue" 
                class="btn btn-danger">Empty - Issue</button>
    </div>

    <div class="form-group">
        <label for="extra_info">Extra Information</label>
        <textarea name="extra_info" 
                  class="form-control @error('extra_info') is-invalid @enderror"
                  rows="3">{{ old('extra_info') }}</textarea>
        @error('extra_info')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</form>
    </div>
</body>
@endsection
