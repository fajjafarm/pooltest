@extends('layouts.vertical', ['title' => 'Starter Page'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Starter'])

    <body>

@if(session('status'))  
        <div class="alert alert-success">{{ session('status') }} </div>
    @endif


    <h2>Submit Water Balance Test</h2>
        <form action="{{ route('water_balance_checks.waterBalanceTestForm') }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="alkalinity">Alkalinity:</label>
            <input type="number" name="alkalinity" id="alkalinity" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="calcium_hardness">Calcium Hardness:</label>
            <input type="number" name="calcium_hardness" id="calcium_hardness" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="ph">pH:</label>
            <input type="number" name="ph" id="ph" step="0.01" class="form-control" required>
            </div>
            <div class="mb-3">
                <!-- Here you might want to dynamically populate this if you have many pools -->
            <label for="pool_id">Pool ID:</label>
            <input type="number" name="pool_id" id="pool_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
@endsection
