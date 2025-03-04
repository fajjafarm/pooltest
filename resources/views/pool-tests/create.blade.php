@extends('layouts.vertical', ['title' => 'Submit a Pool Test'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Submit a Pool Test'])
    
   
@if(session('success'))
    <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
@endif

<div class="card">
<div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Pool Test Recorder</h1>

        <!-- Form -->
        <form method="POST" action="{{ route('pool-tests.store',$pool_id) }}" class="mb-8">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Pool</label>
                    <select name="pool_id" class="w-full border p-2">
                        @foreach($pools as $pool)
                            <option value="{{ $pool->id }}">{{ $pool->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label>DPD1</label>
                    <input type="number" name="dpd1" step="0.01" class="w-full border p-2" required>
                </div>

                <div>
                    <label>DPD3</label>
                    <input type="number" name="dpd3" step="0.01" class="w-full border p-2" required>
                </div>

                <div>
                    <label>pH</label>
                    <input type="number" name="ph" step="0.01" class="w-full border p-2" required>
                </div>

                <div>
                    <label>Sample Location</label>
                    <select name="sample_location" class="w-full border p-2">
                        <option value="pool">Pool</option>
                        <option value="control_panel">Control Panel</option>
                    </select>
                </div>

                <div>
                    <label>Action Taken</label>
                    <select name="action_taken" class="w-full border p-2">
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
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white p-2">Record Test</button>
        </form>

         <!-- Results Table -->
         <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Date/Time</th>
                    <th class="border p-2">Pool</th>
                    <th class="border p-2">DPD1</th>
                    <th class="border p-2">DPD3</th>
                    <th class="border p-2">CCL</th>
                    <th class="border p-2">pH</th>
                    <th class="border p-2">Location</th>
                    <th class="border p-2">Status</th>
                    <th class="border p-2">Action</th>
                    <th class="border p-2">Time Gap</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tests as $index => $test)
                    <tr>
                        <td class="border p-2">{{ $test->created_at }}</td>
                        <td class="border p-2">{{ $test->pool->name }}</td>
                        <td class="border p-2">{{ $test->dpd1 }}</td>
                        <td class="border p-2">{{ $test->dpd3 }}</td>
                        <td class="border p-2">{{ $test->ccl }}</td>
                        <td class="border p-2">{{ $test->ph }}</td>
                        <td class="border p-2">{{ $test->sample_location }}</td>
                        <td class="border p-2">{{ $test->status }}</td>
                        <td class="border p-2">{{ $test->action_taken }}</td>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $tests->links() }}
        </div>
        
            </div><!-- end card-body-->
            
   
   
@endsection