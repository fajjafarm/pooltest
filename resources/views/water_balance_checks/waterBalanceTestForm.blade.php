@extends('layouts.vertical', ['title' => 'Starter Page'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Starter'])

    <body>
    @if(session('status'))
    <div style="color: green; margin-bottom: 10px;">{{ session('status') }}</div>
@endif
@if(session('status'))  
        <div class="alert alert-success">{{ session('status') }} </div>
    @endif
    <form action="{{ route('water_balance_checks.waterBalanceTestForm') }}" method="POST">
        @csrf
        <label for="alkalinity">Alkalinity:</label>
        <input type="number" name="alkalinity" id="alkalinity" step="0.01" required>

        <label for="calcium_hardness">Calcium Hardness:</label>
        <input type="number" name="calcium_hardness" id="calcium_hardness" step="0.01" required>

        <label for="ph">pH:</label>
        <input type="number" name="ph" id="ph" step="0.01" min="0" max="14" required>

        <label for="pool_id">Pool ID:</label>
        <!-- Here you might want to dynamically populate this if you have many pools -->
        <input type="number" name="pool_id" id="pool_id" required>

        <input type="submit" value="Submit Test">
    </form>
</body>
@endsection
