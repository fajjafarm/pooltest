@extends('layouts.vertical', ['title' => 'Starter Page'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Starter'])
    <div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="/equipment-check" method="POST">
        @csrf
        <div class="mb-3">
            <label for="equipment_type" class="form-label">Equipment Type</label>
            <select class="form-select" id="equipment_type" name="equipment_type" required>
                <option value="">Select Equipment</option>
                @foreach($equipmentTypes as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="check_date" class="form-label">Check Date</label>
            <input type="date" class="form-control" id="check_date" name="check_date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="1">Checked</option>
                <option value="0">Not Checked</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Comments</label>
            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="comments" class="form-label">Company</label>
            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

