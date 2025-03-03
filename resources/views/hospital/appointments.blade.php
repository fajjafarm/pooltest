@extends('layouts.vertical', ['title' => 'Appointment'])

@section('content')
    @include('layouts.partials.page-title', ['subtitle' => 'Hospital', 'title' => 'Appointment'])

    <div class="row">
        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:document-medicine-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>

                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Total Appointment</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">152 <span class="fs-15 text-muted ms-1">
                                    Today</span></p>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-dark mb-1 fs-14 d-flex justify-content-between">Dermatology <span
                                class="text-dark fw-semibold">67 Patients</span></p>
                        <p class="text-dark mb-0 fs-14 d-flex justify-content-between">Cardiology <span
                                class="text-dark fw-semibold">23 Patients</span></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:close-square-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>

                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Appointment Cancelled</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">67 <span class="fs-15 text-muted ms-1">
                                    Today</span></p>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-dark mb-1 fs-14 d-flex justify-content-between">Gastroenterology <span
                                class="text-dark fw-semibold">56 Patients</span></p>
                        <p class="text-dark mb-0 fs-14 d-flex justify-content-between">Nephrology <span
                                class="text-dark fw-semibold">11 Patients</span></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:calendar-date-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>

                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Appointment Pending</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">201 <span class="fs-15 text-muted ms-1">
                                    Today</span></p>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-dark mb-1 fs-14 d-flex justify-content-between">Oncology <span
                                class="text-dark fw-semibold">132 Patients</span></p>
                        <p class="text-dark mb-0 fs-14 d-flex justify-content-between">Orthopedics <span
                                class="text-dark fw-semibold">59 Patients</span></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-xxl-3 col-xl-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3">
                        <div>
                            <div class="avatar-lg bg-primary bg-opacity-10 rounded">
                                <iconify-icon icon="solar:user-heart-bold"
                                    class="fs-32 text-primary avatar-title"></iconify-icon>
                            </div>
                        </div>

                        <div>
                            <h4 class="card-title mb-1 d-flex align-items-center gap-2">Total Patient</h4>
                            <p class="text-primary fw-medium fs-20 mb-0">134 <span class="fs-15 text-muted ms-1">
                                    Today</span></p>
                        </div>

                        <div class="dropdown ms-auto">
                            <a href="#" class="dropdown-toggle drop-arrow-none text-muted card-drop"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else here</a>
                            </div><!-- end dropdown-menu -->
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-dark mb-1 fs-14 d-flex justify-content-between">Ophthalmology <span
                                class="text-dark fw-semibold">100 Patients</span></p>
                        <p class="text-dark mb-0 fs-14 d-flex justify-content-between">Endocrinology <span
                                class="text-dark fw-semibold">34 Patients</span></p>
                    </div>
                </div>
                <div class="card-footer border-top border-dashed">
                    <a href="#!" class="link-primary fw-medium">View More <i class="ti ti-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div><!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between border-bottom border-light">
                    <h4 class="header-title">Appointments List</h4>

                    <div class="d-flex flex-wrap gap-1">
                        <a href="#" class="btn btn-success bg-gradient"><i class="ti ti-plus me-1"></i> New
                            Appointment</a>
                        <a href="#" class="btn btn-secondary bg-gradient"><i class="ti ti-file-import me-1"></i>
                            Import</a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap mb-0">
                            <thead class="bg-light-subtle">
                                <tr>
                                    <th class="ps-3" style="width: 50px;">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                    </th>
                                    <th>Patient Name</th>
                                    <th>Age</th>
                                    <th>Department</th>
                                    <th>Doctor Name</th>
                                    <th>Appo. Date</th>
                                    <th>Appo. Time</th>
                                    <th>Mobile No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                    </td>
                                    <td>Alice Johnson</td>
                                    <td>29</td>
                                    <td>Cardiology</td>
                                    <td><img src="/images/users/avatar-2.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.Michael Smith</td>
                                    <td>21/07/2024</td>
                                    <td>09:00 am</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck3">
                                    </td>
                                    <td>Bob Harris</td>
                                    <td>42</td>
                                    <td>Dermatology</td>
                                    <td><img src="/images/users/avatar-3.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.Susan Lee</td>
                                    <td>21/07/2024</td>
                                    <td>10:00 am</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck4">
                                    </td>
                                    <td>Charlie Brown</td>
                                    <td>35</td>
                                    <td>Pediatrics</td>
                                    <td><img src="/images/users/avatar-5.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.Rachel Adams</td>
                                    <td>22/07/2024</td>
                                    <td>11:00 am</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck5">
                                    </td>
                                    <td>Donna Green</td>
                                    <td>47</td>
                                    <td>Orthopedics</td>
                                    <td><img src="/images/users/avatar-9.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.Mark Johnson</td>
                                    <td>22/07/2024</td>
                                    <td>01:00 pm</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck6">
                                    </td>
                                    <td>Eric Miles</td>
                                    <td>52</td>
                                    <td>Neurology</td>
                                    <td><img src="/images/users/avatar-6.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.Julia Clark</td>
                                    <td>23/07/2024</td>
                                    <td>02:00 pm</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                    </td>
                                    <td>Fiona Davies</td>
                                    <td>31</td>
                                    <td>Gastroenterology</td>
                                    <td><img src="/images/users/avatar-5.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.James Martin</td>
                                    <td>23/07/2024</td>
                                    <td>03:00 pm</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck8">
                                    </td>
                                    <td>George Lewis</td>
                                    <td>39</td>
                                    <td>Oncology</td>
                                    <td><img src="/images/users/avatar-3.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.Elizabeth Brown</td>
                                    <td>24/07/2024</td>
                                    <td>04:00 pm</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <input type="checkbox" class="form-check-input" id="customCheck9">
                                    </td>
                                    <td>Hannah Carter</td>
                                    <td>45</td>
                                    <td>Psychiatry</td>
                                    <td><img src="/images/users/avatar-4.jpg" alt=""
                                            class="avatar-sm rounded-circle me-2">Dr.David Wilson</td>
                                    <td>24/07/2024</td>
                                    <td>05:00 pm</td>
                                    <td>+123456789</td>
                                    <td>
                                        <div class="hstack gap-1">
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-primary btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-eye"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-success btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-edit fs-16"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-soft-danger btn-icon btn-sm rounded-circle"> <i
                                                    class="ti ti-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--end card-body-->

            </div><!--end card-->
        </div> <!--end col-->
    </div><!--end row-->
@endsection
