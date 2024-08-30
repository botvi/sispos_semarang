@extends('template-admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Posyandu</p>
                                    <h4 class="my-1 text-info">{{ $totalPosyandu }} POSYANDU</h4>
                                    <p class="mb-0 font-13"></p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                    <i class='bx bx-health'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Puskesmas</p>
                                    <h4 class="my-1 text-danger">{{ $totalPuskesmas }} PUSKESMAS</h4>
                                    <p class="mb-0 font-13"></p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                    <i class='bx bx-health'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Make the Dinas Kesehatan column span full width -->
                <div class="col-12">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Dinas Kesehatan</p>
                                    <h4 class="my-1 text-success">{{ $totalDinasKesehatan }} DINAS</h4>
                                    <p class="mb-0 font-13"></p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class='bx bx-health'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endsection
