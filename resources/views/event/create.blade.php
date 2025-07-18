@extends('template')

@section('own_style')
    <link href="{{ asset('landing_assets/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/jquery-steps.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/night-mode.css') }}" rel="stylesheet">
    <link href="{{ asset('landing_assets/css/night-mode.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper wrapper-body">
        <div class="breadcrumb-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-10">
                        <div class="barren-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <h3>Buat Event Baru</h3>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-dt-block p-80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-12">
                        <div class="wizard-steps-block">
                            <div id="add-event-tab" class="step-app">
                                <ul class="step-steps">
                                    <li class="active">
                                        <a href="#tab_step1">
                                            <span class="number"></span>
                                            <span class="step-name">Detail</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step2">
                                            <span class="number"></span>
                                            <span class="step-name">Lokasi</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab_step3">
                                            <span class="number"></span>
                                            <span class="step-name">Tiket</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="step-content">
                                    <div class="step-tab-panel step-tab-info active" id="tab_step1">
                                        <div class="tab-from-content">
                                            <div class="main-card">
                                                <div class="bp-title">
                                                    <h4><i class="fa-solid fa-circle-info step_icon me-3"></i>Detail</h4>
                                                </div>
                                                <div class="p-4 bp-form main-form">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12">
                                                            <div class="form-group border_bottom pb_30">
                                                                <label class="form-label fs-16">Nama Event*</label>
                                                                <input class="form-control h_50" type="text"
                                                                    id="title"
                                                                    placeholder="Masukin nama Event kamu disini"
                                                                    value="">
                                                            </div>
                                                            <div class="form-group border_bottom pt_30 pb_30">
                                                                <label class="form-label fs-16">Tanggal Event*</label>
                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label mt-3 fs-6">Pilih Tanggal
                                                                            Event dimulai.*</label>
                                                                        <div class="loc-group position-relative">
                                                                            <input class="form-control h_50 datepicker-here"
                                                                                data-language="en" type="text"
                                                                                placeholder="MM/DD/YYYY" value=""
                                                                                id="tanggal_mulai">
                                                                            <span class="absolute-icon"><i
                                                                                    class="fa-solid fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row g-2">
                                                                            <div class="col-md-6">
                                                                                <div class="clock-icon">
                                                                                    <label
                                                                                        class="form-label mt-3 fs-6">Waktu</label>
                                                                                    <select class="selectpicker"
                                                                                        data-size="5"
                                                                                        data-live-search="true"
                                                                                        id="waktu_mulai">
                                                                                        <option value="00:00">00:00
                                                                                        </option>
                                                                                        <option value="00:15">00:15
                                                                                        </option>
                                                                                        <option value="00:30">00:30
                                                                                        </option>
                                                                                        <option value="00:45">00:45
                                                                                        </option>
                                                                                        <option value="01:00">01:00
                                                                                        </option>
                                                                                        <option value="01:15">01:15
                                                                                        </option>
                                                                                        <option value="01:30">01:30
                                                                                        </option>
                                                                                        <option value="01:45">01:45
                                                                                        </option>
                                                                                        <option value="02:00">02:00
                                                                                        </option>
                                                                                        <option value="02:15">02:15
                                                                                        </option>
                                                                                        <option value="02:30">02:30
                                                                                        </option>
                                                                                        <option value="02:45">02:45
                                                                                        </option>
                                                                                        <option value="03:00">03:00
                                                                                        </option>
                                                                                        <option value="03:15">03:15
                                                                                        </option>
                                                                                        <option value="03:30">03:30
                                                                                        </option>
                                                                                        <option value="03:45">03:45
                                                                                        </option>
                                                                                        <option value="04:00">04:00
                                                                                        </option>
                                                                                        <option value="04:15">04:15
                                                                                        </option>
                                                                                        <option value="04:30">04:30
                                                                                        </option>
                                                                                        <option value="04:45">04:45
                                                                                        </option>
                                                                                        <option value="05:00">05:00
                                                                                        </option>
                                                                                        <option value="05:15">05:15
                                                                                        </option>
                                                                                        <option value="05:30">05:30
                                                                                        </option>
                                                                                        <option value="05:45">05:45
                                                                                        </option>
                                                                                        <option value="06:00">06:00
                                                                                        </option>
                                                                                        <option value="06:15">06:15
                                                                                        </option>
                                                                                        <option value="06:30">06:30
                                                                                        </option>
                                                                                        <option value="06:45">06:45
                                                                                        </option>
                                                                                        <option value="07:00">07:00
                                                                                        </option>
                                                                                        <option value="07:15">07:15
                                                                                        </option>
                                                                                        <option value="07:30">07:30
                                                                                        </option>
                                                                                        <option value="07:45">07:45
                                                                                        </option>
                                                                                        <option value="08:00">08:00
                                                                                        </option>
                                                                                        <option value="08:15">08:15
                                                                                        </option>
                                                                                        <option value="08:30">08:30
                                                                                        </option>
                                                                                        <option value="08:45">08:45
                                                                                        </option>
                                                                                        <option value="09:00">09:00
                                                                                        </option>
                                                                                        <option value="09:15">09:15
                                                                                        </option>
                                                                                        <option value="09:30">09:30
                                                                                        </option>
                                                                                        <option value="09:45">09:45
                                                                                        </option>
                                                                                        <option value="10:00">10:00
                                                                                        </option>
                                                                                        <option value="10:15">10:15
                                                                                        </option>
                                                                                        <option value="10:30">10:30
                                                                                        </option>
                                                                                        <option value="10:45">10:45
                                                                                        </option>
                                                                                        <option value="11:00">11:00
                                                                                        </option>
                                                                                        <option value="11:15">11:15
                                                                                        </option>
                                                                                        <option value="11:30">11:30
                                                                                        </option>
                                                                                        <option value="11:45">11:45
                                                                                        </option>
                                                                                        <option value="12:00">12:00
                                                                                        </option>
                                                                                        <option value="12:15">12:15
                                                                                        </option>
                                                                                        <option value="12:30">12:30
                                                                                        </option>
                                                                                        <option value="12:45">12:45
                                                                                        </option>
                                                                                        <option value="13:00">13:00
                                                                                        </option>
                                                                                        <option value="13:15">13:15
                                                                                        </option>
                                                                                        <option value="13:30">13:30
                                                                                        </option>
                                                                                        <option value="13:45">13:45
                                                                                        </option>
                                                                                        <option value="14:00">14:00
                                                                                        </option>
                                                                                        <option value="14:15">14:15
                                                                                        </option>
                                                                                        <option value="14:30">14:30
                                                                                        </option>
                                                                                        <option value="14:45">14:45
                                                                                        </option>
                                                                                        <option value="15:00">15:00
                                                                                        </option>
                                                                                        <option value="15:15">15:15
                                                                                        </option>
                                                                                        <option value="15:30">15:30
                                                                                        </option>
                                                                                        <option value="15:45">15:45
                                                                                        </option>
                                                                                        <option value="16:00">16:00
                                                                                        </option>
                                                                                        <option value="16:15">16:15
                                                                                        </option>
                                                                                        <option value="16:30">16:30
                                                                                        </option>
                                                                                        <option value="16:45">16:45
                                                                                        </option>
                                                                                        <option value="17:00">17:00
                                                                                        </option>
                                                                                        <option value="17:15">17:15
                                                                                        </option>
                                                                                        <option value="17:30">17:30
                                                                                        </option>
                                                                                        <option value="17:45">17:45
                                                                                        </option>
                                                                                        <option value="18:00">18:00
                                                                                        </option>
                                                                                        <option value="18:15">18:15
                                                                                        </option>
                                                                                        <option value="18:30">18:30
                                                                                        </option>
                                                                                        <option value="18:45">18:45
                                                                                        </option>
                                                                                        <option value="19:00">19:00
                                                                                        </option>
                                                                                        <option value="19:15">19:15
                                                                                        </option>
                                                                                        <option value="19:30">19:30
                                                                                        </option>
                                                                                        <option value="19:45">19:45
                                                                                        </option>
                                                                                        <option value="20:00">20:00
                                                                                        </option>
                                                                                        <option value="20:15">20:15
                                                                                        </option>
                                                                                        <option value="20:30">20:30
                                                                                        </option>
                                                                                        <option value="20:45">20:45
                                                                                        </option>
                                                                                        <option value="21:00">21:00
                                                                                        </option>
                                                                                        <option value="21:15">21:15
                                                                                        </option>
                                                                                        <option value="21:30">21:30
                                                                                        </option>
                                                                                        <option value="21:45">21:45
                                                                                        </option>
                                                                                        <option value="22:00">22:00
                                                                                        </option>
                                                                                        <option value="22:15">22:15
                                                                                        </option>
                                                                                        <option value="22:30">22:30
                                                                                        </option>
                                                                                        <option value="22:45">22:45
                                                                                        </option>
                                                                                        <option value="23:00">23:00
                                                                                        </option>
                                                                                        <option value="23:15">23:15
                                                                                        </option>
                                                                                        <option value="23:30">23:30
                                                                                        </option>
                                                                                        <option value="23:45">23:45
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row g-2">
                                                                    <div class="col-md-6">
                                                                        <label class="form-label mt-3 fs-6">Pilih Tanggal
                                                                            Event berakhir.*</label>
                                                                        <div class="loc-group position-relative">
                                                                            <input
                                                                                class="form-control h_50 datepicker-here"
                                                                                data-language="en" type="text"
                                                                                placeholder="MM/DD/YYYY" value=""
                                                                                id="tanggal_selesai">
                                                                            <span class="absolute-icon"><i
                                                                                    class="fa-solid fa-calendar-days"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row g-2">
                                                                            <div class="col-md-6">
                                                                                <div class="clock-icon">
                                                                                    <label
                                                                                        class="form-label mt-3 fs-6">Waktu</label>
                                                                                    <select class="selectpicker"
                                                                                        data-size="5"
                                                                                        data-live-search="true"
                                                                                        id="waktu_selesai">
                                                                                        <option value="00:00">00:00
                                                                                        </option>
                                                                                        <option value="00:15">00:15
                                                                                        </option>
                                                                                        <option value="00:30">00:30
                                                                                        </option>
                                                                                        <option value="00:45">00:45
                                                                                        </option>
                                                                                        <option value="01:00">01:00
                                                                                        </option>
                                                                                        <option value="01:15">01:15
                                                                                        </option>
                                                                                        <option value="01:30">01:30
                                                                                        </option>
                                                                                        <option value="01:45">01:45
                                                                                        </option>
                                                                                        <option value="02:00">02:00
                                                                                        </option>
                                                                                        <option value="02:15">02:15
                                                                                        </option>
                                                                                        <option value="02:30">02:30
                                                                                        </option>
                                                                                        <option value="02:45">02:45
                                                                                        </option>
                                                                                        <option value="03:00">03:00
                                                                                        </option>
                                                                                        <option value="03:15">03:15
                                                                                        </option>
                                                                                        <option value="03:30">03:30
                                                                                        </option>
                                                                                        <option value="03:45">03:45
                                                                                        </option>
                                                                                        <option value="04:00">04:00
                                                                                        </option>
                                                                                        <option value="04:15">04:15
                                                                                        </option>
                                                                                        <option value="04:30">04:30
                                                                                        </option>
                                                                                        <option value="04:45">04:45
                                                                                        </option>
                                                                                        <option value="05:00">05:00
                                                                                        </option>
                                                                                        <option value="05:15">05:15
                                                                                        </option>
                                                                                        <option value="05:30">05:30
                                                                                        </option>
                                                                                        <option value="05:45">05:45
                                                                                        </option>
                                                                                        <option value="06:00">06:00
                                                                                        </option>
                                                                                        <option value="06:15">06:15
                                                                                        </option>
                                                                                        <option value="06:30">06:30
                                                                                        </option>
                                                                                        <option value="06:45">06:45
                                                                                        </option>
                                                                                        <option value="07:00">07:00
                                                                                        </option>
                                                                                        <option value="07:15">07:15
                                                                                        </option>
                                                                                        <option value="07:30">07:30
                                                                                        </option>
                                                                                        <option value="07:45">07:45
                                                                                        </option>
                                                                                        <option value="08:00">08:00
                                                                                        </option>
                                                                                        <option value="08:15">08:15
                                                                                        </option>
                                                                                        <option value="08:30">08:30
                                                                                        </option>
                                                                                        <option value="08:45">08:45
                                                                                        </option>
                                                                                        <option value="09:00">09:00
                                                                                        </option>
                                                                                        <option value="09:15">09:15
                                                                                        </option>
                                                                                        <option value="09:30">09:30
                                                                                        </option>
                                                                                        <option value="09:45">09:45
                                                                                        </option>
                                                                                        <option value="10:00">10:00
                                                                                        </option>
                                                                                        <option value="10:15">10:15
                                                                                        </option>
                                                                                        <option value="10:30">10:30
                                                                                        </option>
                                                                                        <option value="10:45">10:45
                                                                                        </option>
                                                                                        <option value="11:00">11:00
                                                                                        </option>
                                                                                        <option value="11:15">11:15
                                                                                        </option>
                                                                                        <option value="11:30">11:30
                                                                                        </option>
                                                                                        <option value="11:45">11:45
                                                                                        </option>
                                                                                        <option value="12:00">12:00
                                                                                        </option>
                                                                                        <option value="12:15">12:15
                                                                                        </option>
                                                                                        <option value="12:30">12:30
                                                                                        </option>
                                                                                        <option value="12:45">12:45
                                                                                        </option>
                                                                                        <option value="13:00">13:00
                                                                                        </option>
                                                                                        <option value="13:15">13:15
                                                                                        </option>
                                                                                        <option value="13:30">13:30
                                                                                        </option>
                                                                                        <option value="13:45">13:45
                                                                                        </option>
                                                                                        <option value="14:00">14:00
                                                                                        </option>
                                                                                        <option value="14:15">14:15
                                                                                        </option>
                                                                                        <option value="14:30">14:30
                                                                                        </option>
                                                                                        <option value="14:45">14:45
                                                                                        </option>
                                                                                        <option value="15:00">15:00
                                                                                        </option>
                                                                                        <option value="15:15">15:15
                                                                                        </option>
                                                                                        <option value="15:30">15:30
                                                                                        </option>
                                                                                        <option value="15:45">15:45
                                                                                        </option>
                                                                                        <option value="16:00">16:00
                                                                                        </option>
                                                                                        <option value="16:15">16:15
                                                                                        </option>
                                                                                        <option value="16:30">16:30
                                                                                        </option>
                                                                                        <option value="16:45">16:45
                                                                                        </option>
                                                                                        <option value="17:00">17:00
                                                                                        </option>
                                                                                        <option value="17:15">17:15
                                                                                        </option>
                                                                                        <option value="17:30">17:30
                                                                                        </option>
                                                                                        <option value="17:45">17:45
                                                                                        </option>
                                                                                        <option value="18:00">18:00
                                                                                        </option>
                                                                                        <option value="18:15">18:15
                                                                                        </option>
                                                                                        <option value="18:30">18:30
                                                                                        </option>
                                                                                        <option value="18:45">18:45
                                                                                        </option>
                                                                                        <option value="19:00">19:00
                                                                                        </option>
                                                                                        <option value="19:15">19:15
                                                                                        </option>
                                                                                        <option value="19:30">19:30
                                                                                        </option>
                                                                                        <option value="19:45">19:45
                                                                                        </option>
                                                                                        <option value="20:00">20:00
                                                                                        </option>
                                                                                        <option value="20:15">20:15
                                                                                        </option>
                                                                                        <option value="20:30">20:30
                                                                                        </option>
                                                                                        <option value="20:45">20:45
                                                                                        </option>
                                                                                        <option value="21:00">21:00
                                                                                        </option>
                                                                                        <option value="21:15">21:15
                                                                                        </option>
                                                                                        <option value="21:30">21:30
                                                                                        </option>
                                                                                        <option value="21:45">21:45
                                                                                        </option>
                                                                                        <option value="22:00">22:00
                                                                                        </option>
                                                                                        <option value="22:15">22:15
                                                                                        </option>
                                                                                        <option value="22:30">22:30
                                                                                        </option>
                                                                                        <option value="22:45">22:45
                                                                                        </option>
                                                                                        <option value="23:00">23:00
                                                                                        </option>
                                                                                        <option value="23:15">23:15
                                                                                        </option>
                                                                                        <option value="23:30">23:30
                                                                                        </option>
                                                                                        <option value="23:45">23:45
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group pt_30 pb_30">
                                                                <label class="form-label fs-16">Banner Event</label>
                                                                <p class="mt-2 fs-14 d-block mb-3 pe_right">Upload gambar
                                                                    menarik untuk Banner Event kamu</p>
                                                                <div class="content-holder mt-4">
                                                                    <div class="default-event-thumb">
                                                                        <div class="default-event-thumb-btn">
                                                                            <div class="thumb-change-btn">
                                                                                <input type="file" id="thumbnail"
                                                                                    name="thumbnail">
                                                                                <label for="thumbnail">Ubah Gambar</label>
                                                                            </div>
                                                                        </div>
                                                                        <img src="{{ asset('landing_assets/images/banners/custom-img.jpg') }}"
                                                                            alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group border_bottom pb_30">
                                                                <label class="form-label fs-16">Detail Event</label>
                                                                <p class="mt-2 fs-14 d-block mb-3">Tuliskan detail event
                                                                    anda</p>
                                                                <div class="text-editor mt-4">
                                                                    <div id="pd_editor"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="step-tab-panel step-tab-location" id="tab_step2">
                                        <div class="tab-from-content">
                                            <div class="main-card">
                                                <div class="bp-title">
                                                    <h4><i class="fa-solid fa-gear step_icon me-3"></i>Lokasi</h4>
                                                </div>
                                                <div class="p_30 bp-form main-form">

                                                    <div class="form-group">
                                                        <div class="ticket-section">
                                                            <div class="form-group pt_30 pb-2">
                                                                <div class="stepper-data-set">
                                                                    <div class="content-holder template-selector">
                                                                        <div class="row g-4">
                                                                            {{-- <div class="col-md-12">
                                                                                <div class="venue-event">
                                                                                    <div class="map">
                                                                                        <iframe
                                                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254832.60235546026!2d98.50468044429529!3d3.6422714716564024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131cc1c3eb2fd%3A0x23d431c8a6908262!2sMedan%2C%20Kota%20Medan%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1752507869279!5m2!1sid!2sid"
                                                                                            width="600" height="450"
                                                                                            style="border:0;"
                                                                                            allowfullscreen=""
                                                                                            loading="lazy"
                                                                                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                                                        <input type="hidden" id="koordinat_lokasi" name="koordinat_lokasi">
                                                                                    </div>
                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="col-md-12">
                                                                                <div class="form-group mt-1">
                                                                                    <label
                                                                                        class="form-label fs-6">Venue*</label>
                                                                                    <input class="form-control h_50"
                                                                                        type="text" id="nama_tempat"
                                                                                        placeholder="Masukkan nama Tempat"
                                                                                        value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group mt-1">
                                                                                    <label
                                                                                        class="form-label fs-6">Alamat</label>
                                                                                    <input class="form-control h_50"
                                                                                        type="text" id="alamat"
                                                                                        placeholder="Masukin detail alamat Event"
                                                                                        value="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group main-form mt-1">
                                                                                    <label class="form-label">Pilih
                                                                                        Kota*</label>
                                                                                    <select class="selectpicker"
                                                                                        data-size="5" id="kota"
                                                                                        title="Pilih Kota"
                                                                                        data-live-search="true">
                                                                                        @foreach ($kotas as $kota)
                                                                                            <option
                                                                                                value="{{ $kota->id }}">
                                                                                                {{ $kota->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
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
                                        </div>
                                    </div>

                                    <div class="step-tab-panel step-tab-gallery" id="tab_step3">
                                        <div class="tab-from-content">
                                            <div class="main-card">
                                                <div class="bp-title">
                                                    <div class="row p-2">
                                                        <div class="col-6">
                                                            <h4><i
                                                                    class="fa-solid fa-ticket step_icon me-3"></i>Tiket(<span
                                                                    class="venue-event-ticket-counter">3</span>)</h4>
                                                        </div>
                                                        <div class="col-6 d-flex align-items-center justify-content-end">
                                                            <div class="btn-ticket-type-top">
                                                                <button class="main-btn btn-hover h_40 pe-4 ps-4"
                                                                    type="button" id="tambah"
                                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span>Tambah Tiket</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="bp-form main-form">
                                                    <div class="p-4 form-group border_bottom pb_30">
                                                        <div class="">
                                                            <div class="ticket-type-item-empty text-center p_30">
                                                                <div class="ticket-list-icon d-inline-block">
                                                                    <img src="{{ asset('landing_assets/images/ticket.png') }}"
                                                                        alt="">
                                                                </div>
                                                                <h4 class="color-black mt-4 mb-3 fs-18">Belum ada jenis
                                                                    Tiket.</h4>
                                                                <p class="mb-0">Kamu belum membuat jenis Tiket! Tambah
                                                                    tiket dengan mengklik tombol Tambah.</p>
                                                            </div>
                                                            <div class="ticket-type-item-list mt-4">

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="step-footer step-tab-pager mt-4">
                                    <button data-direction="prev"
                                        class="btn btn-default btn-hover steps_btn">Previous</button>
                                    <button data-direction="next"
                                        class="btn btn-default btn-hover steps_btn">Next</button>
                                    <button data-direction="finish" class="btn btn-default btn-hover steps_btn"
                                        id="create">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahTiket" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Tiket *</label>
                        <input type="text" class="form-control" id="nama" name="nama" required
                            placeholder="Masukkan Jenis Tiket">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga *</label>
                        <input type="number" step="0.01" class="form-control" id="harga" name="harga"
                            required placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="kuota" class="form-label">Kuota *</label>
                        <input type="number" class="form-control" id="kuota" name="kuota" value="0"
                            required placeholder="Masukkan Jumlah Kuota">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi Jenis Tiket"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="store">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('own_script')
    <script src="{{ asset('landing_assets/vendor/ckeditor5/ckeditor.js') }}"></script>
    <script src="{{ asset('landing_assets/js/jquery-steps.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('landing_assets/js/i18n/datepicker.en.js') }}"></script>

    <script>
        $('#add-event-tab').steps({
            // onFinish: function() {
            //     alert('Wizard Completed');
            // }
        });
    </script>
    <script>
        let editorInstance;

        ClassicEditor
            .create(document.querySelector('#pd_editor'))
            .then(editor => {
                editorInstance = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        let tickets = [];
        $("#tambah").on("click", function() {
            $("#modalTambahTiket").modal('show');
        })

        let index = 1;
        $("#store").on("click", function() {
            $("#modalTambahTiket").modal('hide');
            let id = index++ + '-pending'
            let data = {
                'index': id,
                'nama': $("#nama").val(),
                'harga': $("#harga").val(),
                'kuota': $("#kuota").val(),
                'deskripsi': $("#deskripsi").val()
            }
            tickets.push(data);

            let newTicket = `
				<div class="price-ticket-card mt-4" id="${id}">
					<div class="price-ticket-card-head d-md-flex flex-wrap align-items-start justify-content-between position-relative p-4">
						<div class="d-flex align-items-center top-name">
							<div class="icon-box">
								<span class="icon-big rotate-icon icon icon-purple">
									<i class="fa-solid fa-ticket"></i>
								</span>
								<h5 class="fs-16 mb-1 mt-1">${$("#nama").val()} - Rp. ${$("#harga").val()}</h5>
								<p class="text-gray-50 m-0"><span class="visitor-date-time">${$("#deskripsi").val()}</span></p>
							</div>
						</div>
						<div class="d-flex align-items-center">
							<div class="dropdown dropdown-default dropdown-text dropdown-icon-item">
								<button class="option-btn-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-solid fa-ellipsis-vertical"></i>
								</button>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="#" class="dropdown-item btn-delete-ticket" data-id="${id}">
										<i class="fa-solid fa-trash-can me-3"></i>Delete
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="price-ticket-card-body border_top p-4">
						<div class="full-width d-flex flex-wrap justify-content-between align-items-center">
							<div class="icon-box">
								<div class="icon me-3">
									<i class="fa-solid fa-ticket"></i>
								</div>
								<span class="text-145">Harga Tiket</span>
								<h6 class="coupon-status">Rp. ${$("#harga").val()}</h6>
							</div>
							<div class="icon-box">
								<div class="icon me-3">
									<i class="fa-solid fa-users"></i>
								</div>
								<span class="text-145">Kuota Tiket</span>
								<h6 class="coupon-status">${$("#kuota").val()} Peserta</h6>
							</div>
						</div>
					</div>
				</div>
			`
            $(".ticket-type-item-list").append(newTicket);
            $(".ticket-type-item-empty").addClass('d-none');
        });

        $(document).on("click", ".btn-delete-ticket", function(e) {
            e.preventDefault();

            const id = $(this).data("id");
            tickets = tickets.filter(t => t.index !== id);
            $("#" + id).remove();

            if (tickets.length === 0) {
                $(".ticket-type-item-empty").removeClass('d-none');
            }
        });
    </script>

    <script>
        $("#create").on("click", function(e) {
            e.preventDefault();

            const thumbnail = $('#thumbnail')[0].files[0];
            const deskripsi = $("#pd_editor").html();
			// let link_maps = $(".venue-event iframe").attr("src");

            let formData = new FormData();
            formData.append('_token', $("meta[name='csrf-token']").attr('content'));			
			// formData.append('link_maps', link_maps);
            formData.append('title', $("#title").val());
            formData.append('tanggal_mulai', $("#tanggal_mulai").val());
            formData.append('waktu_mulai', $("#waktu_mulai").val());
            formData.append('tanggal_selesai', $("#tanggal_selesai").val());
            formData.append('waktu_selesai', $("#waktu_selesai").val());
            formData.append('thumbnail', thumbnail);
            formData.append('deskripsi', editorInstance.getData());
            formData.append('nama_tempat', $("#nama_tempat").val());
            formData.append('alamat', $("#alamat").val());
            formData.append('kota_id', $("#kota").val());
			formData.append('tickets', JSON.stringify(tickets));

            $.ajax({
                url: "/event/store",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {
                        sweetAlert(response.status, "Event berhasil disimpan!");
                        location.reload();
                    } else {
                        sweetAlert(response.status, "Gagal menyimpan event: " + response.message);
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        let message = '';
                        $.each(errors, function(key, val) {
                            message += `${val}\n`;
                        });
                        sweetAlert(response.status, message);
                    } else {
                        sweetAlert(response.status, "Terjadi kesalahan saat menyimpan data.");
                    }
                }
            });
        })
    </script>
@endsection
