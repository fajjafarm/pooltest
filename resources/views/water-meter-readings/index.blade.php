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
                    <h4 class="header-title mb-4">Area Chart with Null values</h4>
                    <div dir="ltr">
                    <div id="line-chart" class="apex-charts" data-colors="#ffbc00"></div>
                    </div>
                </div>
                <!-- end card body-->
            </div>
            <!-- end card -->
            <div class="card">
            <div class="card-body">
            <h4 class="header-title mb-4">Water Meter Readings</h4>
            <div dir="ltr">
            <script>//
// AREA CHART WITH NULL VALUES
//
var colors = ["#39afd1"];
var dataColors = $("#area-chart-nullvalues").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}
var options = {
    colors: colors,
    series: [{
        name: 'Network',
        data: [

            @foreach ($readings as $reading)
            {
            x: {{ $reading->created_at }},
            y: {{ $reading->meter_reading }},
        },
            @endforeach
        {
                        x: 'Pending',
            y: null
                }
        
        ],
    }],
    chart: {
        type: 'area',
        height: 350,
        animations: {
            enabled: false
        },
        zoom: {
            enabled: false
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    fill: {
        opacity: 0.8,
        type: 'pattern',
        pattern: {
            style: ['verticalLines', 'horizontalLines'],
            width: 5,
            height: 6
        },
    },
    markers: {
        size: 5,
        hover: {
            size: 9
        }
    },
    title: {
        text: 'Network Monitoring',
    },
    tooltip: {
        intersect: true,
        shared: false
    },
    theme: {
        palette: 'palette1'
    },
    xaxis: {
        type: 'datetime',
    },
    yaxis: {
        title: {
            text: 'Bytes Received'
        }
    }
};


var chart = new ApexCharts(
    document.querySelector("#area-chart-nullvalues"),
    options
);

chart.render();
</script>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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

@section('scripts')
<script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>
    <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
    <script src="https://apexcharts.com/samples/assets/github-data.js"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    @vite(['resources/js/pages/chart-apex-area.js'])
@endsection

