@extends('layouts.vertical', ['title' => 'Add a new Thermal Suite'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Add a new Thermal Suite'])
    <div class="container mt-5">
    @if(session('success'))  
        <div class="alert alert-success">{{ session('success') }}   </div>
    @endif
    @if(session('notgood'))  
    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <iconify-icon icon="solar:danger-triangle-bold-duotone" class="fs-20 me-1"></iconify-icon>
                        <div class="lh-1"><strong>Error - </strong> {{ session('notgood') }}</div>
                    </div>
    @endif
        <h1>Add New Thermal Suite</h1>
    <form action="{{ route('thermal-suites.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="thermal_name">Thermal Suite Name:</label>
            <input type="text" name="thermal_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="thermal_type">Type:</label>
            <select class="form-select" name="status" aria-label="Example select with button addon">
                <option value="Mixed:Sauna/Steamroom/Loungers" >Mixed:Sauna/Steamroom/Loungers</option>
                <option value="Mixed:Sauna/Steamroom" >Mixed:Sauna/SteamRoom</option>
                <option value="Sauna" >Sauna</option>
                <option value="SteamRoom" >SteamRoom</option>
                <option value="Loungers" >Loungers</option>
            </select>
            
        </div>
        <div class="mb-3">
            <label for="sauna_temp">Sauna Temperature:</label>
            <input type="text" name="sauna_temp" class="form-control" maxlength="20" required>
        </div>
        <div class="mb-3">
            <label for="steamroom_temp">Steamroom Temperature:</label>
            <input type="text" name="steamroom_temp" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="lounger_temp">Lounger Temperature:</label>
            <input type="text" name="lounger_temp" class="form-control" maxlength="20" required>
        </div>
        <div class="mb-3">
            <label for="check_interval">Check Interval (mins)</label>
            <input type="text" name="check_interval" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection