@extends('layouts.vertical', ['title' => 'Water Meter Readings'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Pages', 'title' => 'Water Meter Readings'])
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
    <div class="row">
<div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Water Meter Readings </h4>
                    <div>
                        <a href="{{ route('water-meter-readings.create', ['poolID' => $poolID ])}}" class="btn btn-success bg-gradient"><i
                                class="ti ti-plus me-1"></i> Add a Water Meter Reading</a>
                        
                    </div>
                </div>

            <div class="card">
            <div class="card-body">
            <h4 class="header-title mb-4">Water Meter Readings</h4>
            <div dir="ltr">
            

            {!! $chart->container() !!}
 
 <script src="{{ $chart->cdn() }}"></script>

 {{ $chart->script() }}
 </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
                
            </div>
</div>
<div class="table-responsive-sm">
    <ul>
        @foreach ($readings as $reading)
            <li>{{ $reading->reading_id }} - Reading: {{ $reading->meter_reading }} at Plantroom: {{ $reading->plantroom_id }} by User: {{ $reading->logged_by }}</li>
        @endforeach
    </ul></div>
    </div></div>
@endsection



