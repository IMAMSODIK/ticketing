@extends('template')

@section('content')
    <div class="wrapper wrapper-body">
        <div class="dashboard-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-main-title">
                            <h3><i class="fa-solid fa-gauge me-3"></i>{{$pageTitle}}</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="main-card mt-4">
                            <div class="dashboard-wrap-content">
                                {{-- <div class="d-flex flex-wrap justify-content-between align-items-center p-4">
                                    <div
                                        class="dashboard-date-wrap d-flex flex-wrap justify-content-between align-items-center">
                                        <div class="dashboard-date-arrows">
                                            <a href="#" class="before_date"><i class="fa-solid fa-angle-left"></i></a>
                                            <a href="#" class="after_date disabled"><i
                                                    class="fa-solid fa-angle-right"></i></a>
                                        </div>
                                        <h5 class="dashboard-select-date">
                                            <span>1st April, 2022</span>
                                            -
                                            <span>30th April, 2022</span>
                                        </h5>
                                    </div>
                                    <div class="rs">
                                        <div class="dropdown dropdown-text event-list-dropdown">
                                            <button class="dropdown-toggle event-list-dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span>Selected Events (1)</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">1</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="dashboard-report-content">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card success">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Ticket Sales</span>
                                                        <span class="card-sub-title fs-3">3</span>
                                                    </div>
                                                    <div class="card-media">
                                                        <i class="fa-solid fa-ticket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card success">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Ticket Sales</span>
                                                        <span class="card-sub-title fs-3">3</span>
                                                    </div>
                                                    <div class="card-media">
                                                        <i class="fa-solid fa-ticket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card success">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Ticket Sales</span>
                                                        <span class="card-sub-title fs-3">3</span>
                                                    </div>
                                                    <div class="card-media">
                                                        <i class="fa-solid fa-ticket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card success">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Ticket Sales</span>
                                                        <span class="card-sub-title fs-3">3</span>
                                                    </div>
                                                    <div class="card-media">
                                                        <i class="fa-solid fa-ticket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mt-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
