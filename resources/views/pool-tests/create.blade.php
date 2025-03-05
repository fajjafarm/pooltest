@extends('layouts.vertical', ['title' => 'Submit a Pool Test'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Submit a Pool Test'])
    
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">
<div class="container mx-auto p-4">
               <div class="col-lg-6">
            <div class="card">
               

                <div class="card-body">
                <form method="POST" action="{{ route('pool-tests.store',$pool_id) }}" class="mb-8">
                @csrf
                        <div class="mb-3">
                        <input type="hidden" name="pool_id" value="{{$pool_id}}">
                        <label>DPD1</label>
                    <input type="number" name="dpd1" step="0.01" class="form-control" placeholder="Enter DPD1 Reading" required>

                        </div>
                        <div class="mb-3">
                        <label>DPD3</label>
                    <input type="number" name="dpd3" step="0.01" class="form-control" placeholder="Wait 2 mins then enter DPD3 reading" required>

                        </div>

                        <div class=" mb-3">
                        <label>pH</label>
                    <input type="number" name="ph" step="0.01" class="form-control" required>

                        </div>
                        
                        <div class=" mb-3">
                    <label>Sample Location</label>
                    <select name="sample_location" class="form-select">
                    <option value="control_panel">Control Panel</option>
                        <option value="pool">Pool</option>
                        
                    </select>
                </div>
                <div class=" mb-3">
                    <label>Action Taken</label>
                    <select name="action_taken" class="form-select">
                        <option value="none">None</option>
                        <option value="Changed Chlorine">Changed Chlorine</option>
                        <option value="Changed Acid">Changed Acid</option>
                        <option value="Changed PAC">Changed PAC</option>
                        <option value="Recalibrated Controller">Recalibrated Controller</option>
                        <option value="Backwashed">Backwashed</option>
                        <option value="Supervisor Notified">Supervisor Notified</option>
                        <option value="Code Brown">Code Brown</option>
                        <option value="Code Yellow">Code Yellow</option>
                        <option value="Shocked">Shocked</option>
                    </select>
                </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col -->




         <!-- Results Table -->
         <div class="table-responsive-sm">
         <table class="table table-striped mb-0 table-sm">
    <thead>
                <tr class="table-dark">
                <th class="border p-2">Time Gap</th>
                    <th class="border p-2">DPD1</th>
                    <th class="border p-2">DPD3</th>
                    <th class="border p-2">CCL</th>
                    <th class="border p-2">pH</th>
                    <th class="border p-2">Location</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>
                    <th class="border p-2">Date/Time</th>
                </tr>
            </thead>
            <tbody>
            @if(!empty($tests))
                @foreach($tests as $index => $test)
                    <tr>
                    <td class="border p-2">
                            @if($index < $tests->count() - 1)
                                <?php
                                    $current = $test->created_at;
                                    $next = $tests[$index + 1]->created_at;
                                    $diff = $current->diff($next);
                                    echo sprintf('%dh %dm', $diff->h + ($diff->d * 24), $diff->i);
                                ?>
                            @endif
                        </td>
                        <td class="border p-2">{{ $test->dpd1 }}</td>
                        <td class="border p-2">{{ $test->dpd3 }}</td>
                        <td class="border p-2">{{ $test->ccl }}</td>
                        <td class="border p-2">{{ $test->ph }}</td>
                        <td class="border p-2">{{ $test->sample_location }}</td>
                        <td class="border p-2">{{ $test->status }}</td>
                        <td class="border p-2">{{ $test->action_taken }}</td>

                        <td class="border p-2">{{ $test->created_at }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        <div class="mt-4">
            {{ $tests->links() }}
        </div>
        
            </div><!-- end card-body-->
            
   
   
@endsection