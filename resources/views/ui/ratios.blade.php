@extends('layouts.vertical', ['title' => 'Ratio Video'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Base UI', 'title' => 'Ratio Video'])


    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Responsive Ratio video 21:9</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use class <code>.ratio-21x9</code>
                        <!-- 21:9 aspect ratio -->
                    <div class="ratio ratio-21x9">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Responsive Ratio video 1:1</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use class <code>.ratio-1x1</code></p>
                    <!-- 1:1 aspect ratio -->
                    <div class="ratio ratio-1x1">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Responsive Ratio video 16:9</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use class <code>.ratio-16x9</code>
                        <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->

            <div class="card">
                <div class="card-header border-bottom border-dashed d-flex align-items-center">
                    <h4 class="header-title">Responsive Ratio video 4:3</h4>
                </div>

                <div class="card-body">
                    <p class="text-muted">Use class <code>.ratio-4x3</code>
                        <!-- 4:3 aspect ratio -->
                    <div class="ratio ratio-4x3">
                        <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
