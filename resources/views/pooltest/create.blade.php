@extends('layouts.vertical', ['title' => 'Submit a Pool Test'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Submit a Pool Test'])

    <div class="container mt-5">
    @if(session('success'))  
        <div class="alert alert-success">{{ session('success') }}   @include('flash-message')</div>
    @endif
        <h2>Submit Pool Test Results</h2>
        <form action="{{ route('pooltest.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="dpd1" class="form-label">DPD1:</label>
                <input type="number" step="0.01" name="dpd1" id="dpd1" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="dpd3" class="form-label">DPD3:</label>
                <input type="number" step="0.01" name="dpd3" id="dpd3" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ph" class="form-label">pH:</label>
                <input type="number" step="0.01" name="ph" id="ph" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="comments" class="form-label">Comments:</label>
                <textarea name="comments" id="comments" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>








@endsection
