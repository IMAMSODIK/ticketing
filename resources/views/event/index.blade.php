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
                                <div class="dashboard-report-content">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center border_bottom p-4">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="form-group border_bottom">
                                                <label class="">Pilih Lokasi Event</label>
                                                <select class="selectpicker" multiple="" data-selected-text-format="count > 4"
                                                    data-size="5" title="Select category" data-live-search="true">
                                                    @foreach ($kotas as $kota)
                                                        <option
                                                            value="{{ $kota->id }}">
                                                            {{ $kota->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="rs">
                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1">
                                                <label class="btn btn-outline-primary" for="btnradio1">Bulan Ini</label>
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" checked>
                                                <label class="btn btn-outline-primary" for="btnradio2">Minggu Ini</label>
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3">
                                                <label class="btn btn-outline-primary" for="btnradio3">Hari Ini</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card purple">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Total Event</span>
                                                        <span class="card-sub-title fs-3">{{$count_event}} Event</span>
                                                    </div>
                                                    <div class="card-media">
                                                        <i class="fa-solid fa-ticket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card success">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Event Aktif</span>
                                                        <span class="card-sub-title fs-3">{{$count_event_aktif}} Event</span>
                                                    </div>
                                                    <div class="card-media">
                                                        <i class="fa-solid fa-ticket"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="dashboard-report-card info">
                                                <div class="card-content">
                                                    <div class="card-content">
                                                        <span class="card-title fs-6">Event Selesai</span>
                                                        <span class="card-sub-title fs-3">{{$count_event_done}} Event</span>
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
                            <div class="item-analytics-content p-4 ps-1 pb-2">
                                <div class="d-flex flex-wrap justify-content-between align-items-center border_bottom p-4">
                                    <h3 id="title">Daftar Semua Event</h3>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 m-2">
                                    <div class="event-filter-items">
                                        <div class="featured-controls">
                                            <div class="row" data-ref="event-filter-content">
                                                @foreach ($events as $event)
                                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix arts concert workshops volunteer sports health_Wellness"
                                                    data-ref="mixitup-target">
                                                        <div class="main-card mt-4">
                                                            <div class="event-thumbnail">
                                                                <a href="venue_event_detail_view.html" class="thumbnail-img">
                                                                    <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('own_assets/default_flayer.png') }}" alt="">
                                                                </a>
                                                                {{-- <span class="bookmark-icon" title="Bookmark"></span> --}}
                                                            </div>
                                                            <div class="event-content">
                                                                <a href="/event/detail?id={{$event->id}}" class="event-title">{{$event->title}}</a>
                                                                <div class="duration-price-remaining">
                                                                    <span class="duration-price">
                                                                        @if($event->jenisTiket->isNotEmpty())
                                                                            Harga mulai dari : <br> Rp. {{ number_format($event->jenisTiket->min('harga'), 0, ',', '.') }}
                                                                        @else
                                                                            <span class="badge text-bg-success">Free</span>
                                                                        @endif
                                                                    </span>
                                                                    <span class="remaining"></span>
                                                                </div>
                                                            </div>
                                                            <div class="event-footer">
                                                                <div class="event-timing">
                                                                    <div class="publish-date">
                                                                        <span><i class="fa-solid fa-calendar-day me-2"></i>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('d M') }}</span>
                                                                        <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                                        <span>{{ \Carbon\Carbon::parse($event->tanggal_mulai)->translatedFormat('l') . ', ' . \Carbon\Carbon::parse($event->waktu_mulai)->format('h:i A') }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @if ($count_event > 8)
                                                <div class="browse-btn">
                                                    <a href="explore_events.html" class="main-btn btn-hover ">View More</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
