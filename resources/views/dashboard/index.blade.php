@extends('template')

@section('content')
    <div class="wrapper wrapper-body">
        <div class="dashboard-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-main-title">
                            <h3><i class="fa-solid fa-gauge me-3"></i>{{ $pageTitle }}</h3>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="main-card mt-4">
                            <div class="dashboard-wrap-content">
                                <div class="dashboard-report-content">
                                    <div class="row">

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card success">
                                                <div class="card-content">
                                                    <span class="card-title fs-6">Total Event</span>
                                                    <span class="card-sub-title fs-3">{{ $totalEvent }}</span>
                                                </div>
                                                <div class="card-media">
                                                    <i class="fa-solid fa-calendar-days"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card info">
                                                <div class="card-content">
                                                    <span class="card-title fs-6">Total Tiket Terjual</span>
                                                    <span class="card-sub-title fs-3">{{ $totalTiketTerjual }}</span>
                                                </div>
                                                <div class="card-media">
                                                    <i class="fa-solid fa-ticket"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card save">
                                                <div class="card-content">
                                                    <span class="card-title fs-6">Total User</span>
                                                    <span class="card-sub-title fs-3">{{ $totalUser }}</span>
                                                </div>
                                                <div class="card-media">
                                                    <i class="fa-solid fa-users"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card info">
                                                <div class="card-content">
                                                    <span class="card-title fs-6">Total Pendapatan</span>
                                                    <span class="card-sub-title fs-3">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</span>
                                                </div>
                                                <div class="card-media">
                                                    <i class="fa-solid fa-coins"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mt-4">
                            {{-- Konten tambahan di sini --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
